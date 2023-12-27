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
 * Block service call and rendering defined in this file.
 *
 * @package     local_edwiserreports
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/* eslint-disable no-console */
define('local_edwiserreports/blocks/timespentonsite', [
    'jquery',
    'local_edwiserreports/vendor/apexcharts',
    'local_edwiserreports/common',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/events'
], function(
    $,
    ApexCharts,
    common,
    CFG,
    EdwiserReportsEvents
) {

    /**
     * Block name.
     */
    let blockName = 'timespentonsiteblock';

    /**
     * DOM element selectors list.
     */
    let SELECTOR = {
        PANEL: '#timespentonsiteblock',
        INSIGHT: '#timespentonsiteblock .insight',
        FORMFILTER: '.download-links [name="filter"]',
        GRAPH: '#apex-chart-timespentonsite-block',
        STUDENT: '#timespentonsite-student-select'
    };

    let PROMISE = {
        /**
         * Get timespent on site using filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_TIMESPENTONSITE: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_timespentonsite_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter
                    })
                },
            });
        }
    };

    /**
     * Filter for ajax.
     */
    let filter = {
        date: null,
        student: 0,
        dir: $('html').attr('dir'),
        rtl: $('html').attr('dir') == 'rtl' ? 1 : 0
    };

    /**
     * Chart object.
     */
    let chart = null;

    /**
     * Line chart default config.
     */
    const lineChartDefault = {
        series: [],
        chart: {
            id: 'timespentonsite',
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
        },
        stroke: {
            curve: 'smooth',
            width: 2
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
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetY: '-20',
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
        },
        dataLabels: {
            enabled: false
        },
        colors: [CFG.getColorTheme()[2]],
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        }
    };

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
     * Load graph
     */
    function loadGraph(invalidUser) {
        common.loader.show(SELECTOR.PANEL);

        // Set export filter to download link.
        let exportFilter = Object.keys(filter).map(key => filter[key]).join("-");
        $(SELECTOR.PANEL).find(SELECTOR.FORMFILTER).val(exportFilter);

        PROMISE.GET_TIMESPENTONSITE(filter)
            .done(function(response) {
                let data = Object.assign({}, lineChartDefault);
                data.series = [{
                    name: M.util.get_string('timespentonsite', 'local_edwiserreports'),
                    data: response.timespent,
                }];
                data.yaxis = {
                    labels: {
                        formatter: common.timeFormatter
                    }
                };
                data.xaxis.categories = response.dates.map(date => date * 86400000);
                data.chart.toolbar.show = response.dates.length > 29;
                data.chart.zoom.enabled = response.dates.length > 29;
                data.tooltip.y.title.formatter = () => {
                    return M.util.get_string('time', 'local_edwiserreports') + ': ';
                }
                response.insight.insight.value = common.timeFormatter(response.insight.insight.value, {
                    dataPointIndex: 0,
                    short: true
                }, filter.rtl).replaceAll(',', ' ');
                response.insight.details.data[0].value = common.timeFormatter(response.insight.details.data[0].value, {
                    dataPointIndex: 0
                }, filter.rtl);
                common.insight(SELECTOR.INSIGHT, response.insight);
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);
            }).fail(function(exception) {
                common.loader.hide(SELECTOR.PANEL);
            });
    }

    /**
     * Initialize events.
     */
    function initEvents() {
        // Date selector listener.
        common.dateChange(function(date) {
            filter.date = date;
            loadGraph();
        });

        // Student selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.STUDENT}`, function() {
            filter.student = parseInt($(this).val());

            // Load graph data.
            loadGraph();
        });

        // Export to PDF.
        $(document).on(EdwiserReportsEvents.EXPORTGRAPHPDF + '-' + blockName, function() {
            let graphElement = $(SELECTOR.PANEL).find('.apexcharts-canvas');
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
    }

    /**
     * Initialize
     * @param {function} invalidUser Callback function
     * @param {String}   currentDate Current active date
     */
    function init(invalidUser, currentDate) {

        // Assigning current date.
        filter.date = currentDate;

        if (!$(SELECTOR.PANEL).length) {
            return;
        }

        loadGraph(invalidUser);

        initEvents();

        $(SELECTOR.PANEL).find('.singleselect').select2();
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
            name: M.util.get_string('timespentonsite', 'local_edwiserreports'),
            data: response.timespent,
        }];
        data.yaxis = {
            labels: {
                formatter: common.timeFormatter
            }
        };
        data.xaxis.categories = response.dates.map(date => date * 86400000);
        data.chart.toolbar.show = false;
        data.tooltip = {
            enabled: false
        };
        data.chart.animations = {
            enabled: false
        };
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
