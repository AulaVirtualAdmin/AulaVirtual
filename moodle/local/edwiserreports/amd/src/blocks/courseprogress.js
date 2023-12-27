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
define('local_edwiserreports/blocks/courseprogress', [
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/templates',
    'local_edwiserreports/vendor/apexcharts',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/common',
    'local_edwiserreports/events',
    'local_edwiserreports/select2'
], function(
    $,
    ModalFactory,
    ModalEvents,
    Templates,
    ApexCharts,
    CFG,
    common,
    EdwiserReportsEvents
) {

    /**
     * Block name
     */
    let blockName = 'courseprogressblock';

    /**
     * Chart object.
     */
    let chart = null;

    /**
     * Position for legend.
     */
    let position = 'right';

    let dirattr = $('html').attr('dir');
    if (dirattr == 'rtl') {
        position = 'left';
    }


    /**
     * Filter for ajax.
     */
    var filter = {
        cohort: 0,
        course: 0,
        group: 0,
        dir: $('html').attr('dir')
    };

    /**
     * Ranges
     */
    var ranges = ["81to100", "61to80", "41to60", "21to40", "0to20"];

    /**
     * Selectors.
     */
    let SELECTOR = {
        PANEL: '#courseprogressblock',
        GRAPH: '.graph',
        COHORT: '.cohort-select',
        COURSE: '.course-select',
        GROUP: '.group-select',
        INSIGHT: '#courseprogressblock .insight',
        FORMFILTER: '.download-links input[name="filter"]'
    };


    /**
     * Donut chart default config.
     */
    let chartData = {
        data: [0, 0, 0, 0, 0, 0],
        labels: [
            '81% - 100%',
            '61% - 80%',
            '41% - 60%',
            '21% - 40%',
            '0% - 20%'
        ]
    };

    /**
     * Chart default.
     */
    let donutChartDefault = {
        plotOptions: {
            pie: {
                expandOnClick: false
            }
        },
        chart: {
            id: 'courseprogress',
            type: 'donut',
            height: 350,
            events: {
                dataPointSelection: function(event, chartContext, config) {
                    createCourseProgressTable(
                        config.dataPointIndex,
                        $(`${SELECTOR.PANEL} ${SELECTOR.COURSE} option:selected`).text()
                    );
                }
            }
        },
        colors: CFG.getColorTheme(),
        fill: {
            type: 'solid',
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                let value = series[seriesIndex];
                let tooltip = value < 2 ? chartData.tooltipStrings.single : chartData.tooltipStrings.plural;
                let label = w.config.labels[seriesIndex];
                let color = w.config.colors[seriesIndex];
                return `<div class="custom-donut-tooltip" style="text-align:center">
                            <div style="color: ${color};">
                                <span style="font-weight: 500;"> ${label}:</span>
                                <span style="font-weight: 700;"> ${value} ${M.util.get_string(tooltip, 'local_edwiserreports')}</span>
                            </div>
                            <span style="color: black; font-size: 0.871rem;">${M.util.get_string('clickonchartformoreinfo', 'local_edwiserreports')}</span>
                        </div>`;
            }
        },
        legend: {
            position: position,
            formatter: function(seriesName, opts) {
                return [seriesName + ": " + opts.w.globals.series[opts.seriesIndex]]
            }
        },
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        }
    };

    /**
     * All promises.
     */
    let PROMISE = {
        /**
         * Get course progress block chart data.
         * @returns {PROMISE}
         */
        GET_COURSEPROGRESS: function() {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_courseprogress_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify(filter)
                }
            });
        },

        /**
         * Get table data for popup modal based on filters and range
         * @param   {string}  range Grade range
         * @returns {PROMISE}
         */
        GET_TABLE_DATA: function(range) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_courseprogress_modal_data',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter,
                        range: range
                    })
                }
            });
        }
    };

    /**
     * Create Course Progress Table.
     * @param {string} range Progress range.
     * @param {string} title Modal title.
     */
    function createCourseProgressTable(range, title) {
        let rangeSplit = ranges[range].split('to');
        ModalFactory.create({
            body: `<label class="text-center w-100 py-2">
                    <i class="fa fa-circle-o-notch fa-spin"></i>
                </label>`,
            title: `${title} (${rangeSplit[0]}% - ${rangeSplit[1]}%)`
        }).then(function(modal) {
            let modalRoot = modal.getRoot();
            modalRoot.find('.modal-dialog').addClass('modal-lg');
            modal.show();
            modalRoot.on(ModalEvents.hidden, function() {
                modal.destroy();
            });

            // Get data for modal table.
            PROMISE.GET_TABLE_DATA(ranges[range])
                .done(function(response) {
                    Templates.render('local_edwiserreports/modal_table', response)
                        .done(function(html, js) {
                            Templates.replaceNodeContents(modal.getBody(), html, js);
                        })
                        .fail(Notification.exception);
                });
        }).fail(Notification.exception);
    }

    /**
     * Reload filters.
     * @param {Array}    types    Types of filter to refresh
     * @param {Function} callback Callback functions
     */
    function reloadFilter(types, callback) {
        common.loader.show(SELECTOR.PANEL);
        common.reloadFilter(
            SELECTOR.PANEL,
            types,
            filter.cohort,
            filter.course,
            filter.group,
            callback
        );
    }

    /**
     * Render graph.
     * @param {DOM} graph Graph element
     * @param {Object} data Graph data
     */
    function renderGraph(graph, data) {
        if (chart !== null) {
            chart.destroy();
        }
        chart = new ApexCharts(graph.get(0), data);
        chart.render();
        setTimeout(function() {
            common.loader.hide(SELECTOR.PANEL);
        }, 1000);
    }

    /**
     * Load graph data.
     */
    function loadGraph() {

        // Set export filter to download link.
        $(SELECTOR.PANEL).find(SELECTOR.FORMFILTER).val(JSON.stringify(filter));

        // Show loader.
        common.loader.show(SELECTOR.PANEL);

        PROMISE.GET_COURSEPROGRESS()
            .done(function(response) {
                if (response.error === true && response.exception.errorcode === 'invalidsecretkey') {
                    invalidUser('courseprogressblock', response);
                    return;
                }

                chartData.data = response.data;
                chartData.average = common.toPrecision(response.average, 2);
                chartData.tooltipStrings = response.tooltip;
            })
            .fail(function(error) {
                chartData.average = '0';
            })
            .always(function() {
                common.insight(SELECTOR.INSIGHT, {
                    'insight': {
                        'value': chartData.average + '%',
                        'title': 'averagecourseprogress'
                    }
                });
                data = Object.assign({}, donutChartDefault);
                if (chartData.data.length != 0) {
                    data.labels = chartData.labels;
                    data.series = chartData.data.reverse();
                } else {
                    data.labels = [];
                    data.series = [];
                }
                // $(SELECTOR.PANEL).find(SELECTOR.GRAPH).toggleClass('empty-donut', chartData.data.length == 0);
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);;

                // Hide loader.
                common.loader.hide(SELECTOR.PANEL);
            });
    }

    /**
     * Initialize
     * @param {function} invalidUser Callback function
     */
    function init(invalidUser) {

        if ($(SELECTOR.COURSE).length == 0 || $(SELECTOR.PANEL).length == 0) {
            return;
        }

        filter.course = $(`${SELECTOR.PANEL} ${SELECTOR.COURSE}`).val();
        $(SELECTOR.PANEL + ' .singleselect').select2();

        // Cohort selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COHORT}`, function() {
            filter.cohort = parseInt($(this).val());
            reloadFilter(['course', 'noallcourses'], function() {
                setTimeout(function() {
                    filter.course = $(`${SELECTOR.PANEL} ${SELECTOR.COURSE} option:first-child`).val();
                    $(`${SELECTOR.PANEL} ${SELECTOR.COURSE}`).val(filter.course).trigger('change');
                }, 50);
            });
        });

        // Course selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COURSE}`, function() {
            filter.course = parseInt($(this).val());
            filter.group = 0;
            reloadFilter(['group'], function() {
                loadGraph();
            });
        });

        // Group selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.GROUP}`, function() {
            filter.group = parseInt($(this).val());
            // Load graph data.
            loadGraph();
        });

        // Export to PDF.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHPDF + '-' + blockName, function() {
            let graphElement = $(SELECTOR.PANEL).find(SELECTOR.GRAPH);
            common.exportGraphPDF(chart, filter, graphElement.width(), graphElement.height());
        });

        // Export to JPEG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHJPEG + '-' + blockName, function() {
            common.exportGraphJPEG(chart, filter);
        });

        // Export to PNG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHPNG + '-' + blockName, function() {
            common.exportGraphPNG(chart, filter);
        });

        // Export to SVG.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHSVG + '-' + blockName, function() {
            common.exportGraphSVG(chart, filter);
        });

        // Handling legend position based on width.
        setInterval(function() {
            if (chart === null) {
                return;
            }
            let width = $(SELECTOR.PANEL).find('.apexcharts-canvas').width();
            var attr = $('html').attr('dir');
            let newPosition = width >= 400 ? 'right' : 'bottom';
            if (attr == 'rtl') {
                newPosition = width >= 400 ? 'left' : 'bottom';
            }
            if (newPosition == position) {
                return;
            }
            position = newPosition;
            chart.updateOptions({
                legend: {
                    position: position
                }
            })
        }, 1000);
        common.handleFilterSize(SELECTOR.PANEL);
        loadGraph();
    }

    /**
     * Download grade block's graph in specified format.
     *
     * @param {String} format   Format of downloading file
     * @param {String} filename Name of file
     * @param {String} data     Exported data
     */
    function download(format, filename, response) {
        chartData.data = response.data;

        data = Object.assign({}, donutChartDefault);
        if (chartData.data.length != 0) {
            data.labels = chartData.labels;
            data.series = chartData.data.reverse();
        } else {
            data.labels = [];
            data.series = [];
        }
        data.tooltip = {
            enabled: false
        };
        data.chart.animations = {
            enabled: false
        };
        $(SELECTOR.PANEL).find(SELECTOR.GRAPH).toggleClass('empty-donut', chartData.data.length == 0);
        renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);

        switch (format) {
            case 'pdfimage':
                let graphElement = $(SELECTOR.PANEL).find(SELECTOR.GRAPH);
                common.exportGraphPDF(chart, filter, graphElement.width(), graphElement.height(), filename);
                break;
            case 'jpeg':
                common.exportGraphJPEG(chart, filter, filename);
                break;
            case 'png':
                common.exportGraphPNG(chart, filter, filename);
                break;
            case 'svg':
                common.exportGraphSVG(chart, filter, filename);
                break;
        }
    }

    // Must return the init function
    return {
        init: init,
        download: download
    };
});
