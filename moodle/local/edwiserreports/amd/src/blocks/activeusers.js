// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Plugin administration pages are defined here.
 *
 * @package     local_edwiserreports
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/* eslint-disable no-console */
define('local_edwiserreports/blocks/activeusers', [
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/templates',
    'local_edwiserreports/vendor/apexcharts',
    'core/notification',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/events',
    'local_edwiserreports/common',
    'local_edwiserreports/flatpickr'
], function(
    $,
    ModalFactory,
    ModalEvents,
    Templates,
    ApexCharts,
    Notification,
    CFG,
    EdwiserReportsEvents,
    common
) {
    /* Varible for active users block */
    var activeUsersData = null;
    var blockName = 'activeusersblock';
    var activeUsersGraph = null;
    var filter = null;
    var timer = null;

    /**
     * Filters
     */
    // var filter = {
    //     daterange: null,
    //     dir: $('html').attr('dir')
    // };

    /**
     * Modal data table array.
     */
    var modalDataTable = [];

    /**
     * Selectors list.
     */
    var SELECTOR = {
        PANEL: '#activeusersblock',
        RESETTIME: '#activeusersblock #updated-time > span.minute',
        REFRESH: '#activeusersblock .refresh',
        CONTEXT: '[data-contextid]',
        FORMFILTER: "#activeusers .download-links input[name='filter']",
        MODALROOT: '.siteoverview-modal-tables',
        MODALLINK: '.siteoverview-modal-tables .nav .nav-link',
        MODALTAB: '.siteoverview-modal-tables .tabs .tab'
    };

    /**
     * Promise list.
     */
    var PROMISE = {
        /**
         * Get data for graph.
         * @returns {PROMISE}
         */
        GET_DATA: function() {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_activeusers_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter,
                        graphajax: true
                    })
                },
            });
        },

        /**
         * Get table data for popup modal based on selected date
         * @param   {String}  date Selected date
         * @param   {String}  type Type of table to fetch
         * @returns {PROMISE}
         */
        GET_TABLE_DATA: function(date, type) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_siteoverviewstatus_block_modal_data',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        date: date,
                        type: type
                    })
                }
            });
        }
    }

    /**
     * Line chart default config.
     */
    const lineChartDefault = {
        series: [],
        chart: {
            id: 'activeusers',
            type: 'line',
            height: 350,
            dropShadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
            },
            toolbar: {
                show: false,
                tools: {
                    download: false,
                    reset: '<i class="fa fa-refresh"></i>'
                }
            },
            zoom: {
                enabled: false
            },
            events: {
                click: function(event, chartContext, w) {
                    if (w.dataPointIndex == -1) {
                        return;
                    }
                    let context = {},
                        active = 'active';
                    ["activeusers", "enrolments", "completions"].forEach((tab, i) => {
                        if (w.globals.collapsedSeriesIndices.indexOf(i) !== -1) {
                            return;
                        }
                        context[tab] = {
                            active: active
                        };
                        active = '';
                    });
                    context.date = w.config.xaxis.categories[w.dataPointIndex] / 86400000;
                    createSiteOverivewModal(context);
                }
            }
        },
        markers: {
            size: 0
        },
        tooltip: {
            enabled: true,
            enabledOnSeries: undefined,
            shared: true,
            followCursor: false,
            intersect: false,
            inverseOrder: false,
            fillSeriesColor: false,
            onDatasetHover: {
                highlightDataSeries: false,
            },
            y: {
                formatter: undefined,
                title: {},
            },
            items: {
                display: 'flex'
            },
            fixed: {
                enabled: false,
                position: 'topRight',
                offsetX: 0,
                offsetY: 0,
            },
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                let tooltip = `
                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                    ${common.formatDate(new Date(w.config.xaxis.categories[dataPointIndex]), "d MMM yyyy")}
                </div>`;
                for (let index = 0; index < w.config.series.length; index++) {
                    const element = w.config.series[index];
                    if (element.data.length == 0) {
                        continue;
                    }
                    tooltip += `<div class="apexcharts-tooltip-series-group apexcharts-active" style="order: ${index}; display: flex;">
                        <span class="apexcharts-tooltip-marker" style="background-color: ${w.config.colors[index]};"></span>
                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                            <div class="apexcharts-tooltip-y-group">
                                <span class="apexcharts-tooltip-text-y-label">${w.config.series[index].name}: </span>
                                <span class="apexcharts-tooltip-text-y-value">${w.config.series[index].data[dataPointIndex]}</span>
                            </div>
                        </div>
                    </div>`;
                }
                return tooltip + `
                    <span style="color: black; font-size: 0.871rem; order: 4; padding: 0px 15px;">${M.util.get_string('clickondatapoint', 'local_edwiserreports')}</span>
                `;
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2,
            lineCap: 'round'
        },
        grid: {
            borderColor: '#e7e7e7'
        },
        xaxis: {
            categories: null,
            type: 'datetime',
            labels: {
                hideOverlappingLabels: true,
                datetimeFormatter: {
                    year: 'yyyy',
                    month: 'MMM \'yy',
                    day: 'dd MMM',
                    hour: ''
                }
            },
            tooltip: {
                enabled: false
            }
        },
        yaxis: {
            labels: {
                formatter: function(val, index) {
                    return val === undefined ? val : val.toFixed(0);
                }
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetY: '-20',
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
        },
        colors: CFG.getColorTheme(),
        dataLabels: {
            enabled: false
        }
    };

    /**
     * Load site overview modal table data.
     *
     * @param {Interger} date  Selected data
     * @param {DOM}      modal Modal dom object
     * @param {String}   type  Type of table
     */
    function loadSiteOverviewTable(date, target, type) {
        // Get data for modal table.
        PROMISE.GET_TABLE_DATA(date, type)
            .done(function(response) {
                Templates.render('local_edwiserreports/modal_table', response)
                    .done(function(html, js) {
                        let tab = target.find(`[data-id="${type}"]`);
                        tab.data('loaded', true);
                        Templates.replaceNodeContents(tab, html, js);
                    })
                    .fail(Notification.exception);;
            });
    }

    /**
     * Create Course Progress Table.
     *
     * @param {object} context Context for modal tabs
     */
    function createSiteOverivewModal(context) {
        Templates.render('local_edwiserreports/siteoverviewblock_modal_body', context)
            .done(function(html, js) {
                ModalFactory.create({
                    body: html,
                    title: `${M.util.get_string('activeusersheader', 'local_edwiserreports')} (${
                        common.formatDate(new Date(context.date * 86400000), "d MMM yyyy")
                    })`
                }).then(function(modal) {
                    let modalRoot = modal.getRoot();
                    modalRoot.find('.modal-dialog').addClass('modal-lg');
                    modal.show();
                    modalRoot.on(ModalEvents.hidden, function() {
                        modal.destroy();
                    });
                    loadSiteOverviewTable(
                        context.date,
                        modal.getBody().find(SELECTOR.MODALROOT),
                        modal.getBody().find('.nav-link.active').data('target')
                    );
                }).fail(Notification.exception);
            });
    }

    /**
     * Initialize events.
     */
    function initEvents() {
        /* Refresh when click on the refresh button */
        $(SELECTOR.REFRESH).on('click', function() {
            $(this).addClass("refresh-spin");
            getActiveUsersBlockData();
        });

        // Date selector listener.
        common.dateChange(function(date) {
            filter = date;

            // Set export filter to download link.
            // $(SELECTOR.PANEL).find('.download-links [name="filter"]').val(filter);
            // $(SELECTOR.FORMFILTER).val(JSON.stringify(filter));
            $(SELECTOR.FORMFILTER).val(filter);
            $("#userfilter .download-links input[name='filter']").val(filter);
            
            getActiveUsersBlockData();
        });

        // Export to PDF.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHPDF + '-' + blockName, function() {
            let graphElement = $(SELECTOR.PANEL).find('.apexcharts-canvas');
            common.exportGraphPDF(activeUsersGraph, {
                date: filter
            }, graphElement.width(), graphElement.height());
        });

        // Export to JPEG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHJPEG + '-' + blockName, function() {
            common.exportGraphJPEG(activeUsersGraph, {
                date: filter
            });
        });

        // Export to PNG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHPNG + '-' + blockName, function() {
            common.exportGraphPNG(activeUsersGraph, {
                date: filter
            });
        });

        // Export to SVG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHSVG + '-' + blockName, function() {
            common.exportGraphSVG(activeUsersGraph, {
                date: filter
            });
        });

        $('body').on('click', SELECTOR.MODALLINK, function() {
            let target = $(this).data('target');
            $(SELECTOR.MODALLINK).removeClass('active');
            $(this).addClass('active');
            $(SELECTOR.MODALTAB).removeClass('active');
            $(SELECTOR.MODALTAB + `[data-id="${target}"]`).addClass('active');
            if ($(SELECTOR.MODALTAB + `[data-id="${target}"]`).data('loaded')) {
                return;
            }
            loadSiteOverviewTable($(SELECTOR.MODALROOT).data('date'), $(SELECTOR.MODALROOT), target);
        });
    }

    /**
     * Get data for active users block.
     */
    function getActiveUsersBlockData() {
        // Show loader.
        common.loader.show(SELECTOR.PANEL);
        PROMISE.GET_DATA().done(function(response) {
            if (response.error === true && response.exception.errorcode === 'invalidsecretkey') {
                invalidUser('activeusersblock', response);
                return;
            }

            activeUsersData.graph.data = response.data;
            activeUsersData.graph.labels = response.dates.map(date => date * 86400000);


            common.insight(SELECTOR.PANEL + ' .insight', response.insight);
        }).fail(function(error) {
            Notification.exception(error);
        }).always(function() {
            activeUsersGraph = generateActiveUsersGraph();
            // V.changeExportUrl(filter, exportUrlLink, V.filterReplaceFlag);
            $(SELECTOR.PANEL).find('.download-links input[name="filter"]').val(filter);

            // Change graph variables
            resetUpdateTime();
            clearInterval(timer);
            timer = setInterval(increamentUpdateTime, 1000 * 60);
            $(SELECTOR.REFRESH).removeClass('refresh-spin');
            // Hide loader.
            common.loader.hide(SELECTOR.PANEL);
        });
    }

    /**
     * Reset Update time in panel header.
     */
    function resetUpdateTime() {
        $(SELECTOR.RESETTIME).html(0);
    }

    /**
     * Increament update time in panel header.
     */
    function increamentUpdateTime() {
        $(SELECTOR.RESETTIME).html(parseInt($(SELECTOR.RESETTIME).text()) + 1);
    }

    /**
     * Generate Active Users graph.
     * @returns {Object} Active users graph
     */
    function generateActiveUsersGraph() {
        if (activeUsersGraph) {
            activeUsersGraph.destroy();
        }
        activeUsersGraph = new ApexCharts($("#apex-chart-active-users").get(0), getGraphData());
        activeUsersGraph.render();
        return activeUsersGraph;
    }

    /**
     * Get graph data.
     * @return {Object}
     */
    function getGraphData() {
        let data = Object.assign({}, lineChartDefault);
        try {
            data.series = [{
                name: activeUsersData.graph.labelName.activeUsers,
                data: activeUsersData.graph.data.activeUsers,
            }, {
                name: activeUsersData.graph.labelName.enrolments,
                data: activeUsersData.graph.data.enrolments,
            }, {
                name: activeUsersData.graph.labelName.completionRate,
                data: activeUsersData.graph.data.completionRate,
            }];
            data.xaxis.categories = activeUsersData.graph.labels;
            data.chart.toolbar.show = activeUsersData.graph.labels.length > 29;
            data.chart.zoom.enabled = activeUsersData.graph.labels.length > 29;
        } catch (error) {
            data.series = [];
            data.xaxis.categories = [];
            data.chart.toolbar.show = false;
            data.chart.zoom.enabled = false;
        }
        return data;
    }

    /**
     * Initialize
     * @param {function} invalidUser Callback function
     * @param {String}   currentDate Current active date
     */
    function init(invalidUser, currentDate) {

        // Assigning current date.
        filter = currentDate;

        console.log('filter::::');
        console.log(filter);

        $(SELECTOR.FORMFILTER).val(filter);
        // $("#userfilter .download-links input[name='filter']").val(JSON.stringify(filter));

        /* Custom Dropdown hide and show */
        activeUsersData = CFG.getActiveUsersBlock();

        // If course progress block is there
        if (activeUsersData) {
            /* Call function to initialize the active users block graph */
            getActiveUsersBlockData()
        }

        initEvents();
    }

    /**
     * Download grade block's graph in specified format.
     *
     * @param {String} format   Format of downloading file
     * @param {String} filename Name of file
     * @param {String} data     Exported data
     */
    function download(format, filename, response) {
        let data = Object.assign({}, lineChartDefault);
        data.series = [{
            name: M.util.get_string('activeusers', 'local_edwiserreports'),
            data: response.data.activeUsers,
        }, {
            name: M.util.get_string('courseenrolment', 'local_edwiserreports'),
            data: response.data.enrolments,
        }, {
            name: M.util.get_string('coursecompletionrate', 'local_edwiserreports'),
            data: response.data.completionRate,
        }];
        data.xaxis.categories = response.dates.map(date => date * 86400000);
        data.chart.toolbar.show = false;
        data.tooltip = {
            enabled: false
        };
        data.chart.animations = {
            enabled: false
        };
        activeUsersGraph = new ApexCharts($("#apex-chart-active-users").get(0), data);
        activeUsersGraph.render();

        switch (format) {
            case 'pdfimage':
                let graphElement = $("#apex-chart-active-users");
                common.exportGraphPDF(activeUsersGraph, filter, graphElement.width(), graphElement.height(), filename);
                break;
            case 'jpeg':
                common.exportGraphJPEG(activeUsersGraph, filter, filename);
                break;
            case 'png':
                common.exportGraphPNG(activeUsersGraph, filter, filename);
                break;
            case 'svg':
                common.exportGraphSVG(activeUsersGraph, filter, filename);
                break;
        }
    }

    // Must return the init function
    return {
        init: init,
        download: download
    };
});
