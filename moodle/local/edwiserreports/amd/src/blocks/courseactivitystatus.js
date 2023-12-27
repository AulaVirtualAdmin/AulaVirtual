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
define('local_edwiserreports/blocks/courseactivitystatus', [
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
     * Block name
     */
    let blockName = 'courseactivitystatusblock';
    /**
     * DOM element selectors list.
     */
    let SELECTOR = {
        PANEL: '#courseactivitystatusblock',
        INSIGHT: '#courseactivitystatusblock .insight',
        FORMFILTER: '.download-links [name="filter"]',
        GRAPH: '#apex-chart-courseactivitystatus-block',
        COHORT: '.cohort-select',
        COURSE: '.course-select',
        GROUP: '.group-select',
        STUDENT: '.student-select'
    };

    let PROMISE = {
        /**
         * Get timespent on site using filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_COURSEACTIVITYSTATUS: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_courseactivitystatus_graph_data_ajax',
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
        cohort: 0,
        course: 0,
        group: 0,
        student: 0
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
            id: 'courseactivitystatus',
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
        dataLabels: {
            enabled: false
        },
        colors: CFG.getColorTheme(),
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
        $(SELECTOR.PANEL).find(SELECTOR.FORMFILTER).val(JSON.stringify(filter));

        PROMISE.GET_COURSEACTIVITYSTATUS(filter)
            .done(function(response) {
                let data = Object.assign({}, lineChartDefault);
                data.series = [{
                    name: M.util.get_string('courseactivitystatus-submissions', 'local_edwiserreports'),
                    data: response.submissions,
                }, {
                    name: M.util.get_string('courseactivitystatus-completions', 'local_edwiserreports'),
                    data: response.completions,
                }];
                data.xaxis.categories = response.dates.map(date => date * 86400000);
                data.chart.toolbar.show = response.dates.length > 29;
                data.chart.zoom.enabled = response.dates.length > 29;
                data.tooltip.y.title.formatter = null;
                common.insight(SELECTOR.INSIGHT, response.insight);
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);
            }).fail(function(exception) {
                common.loader.hide(SELECTOR.PANEL);
            });
    }

    /**
     * Reload filters.
     */
    function reloadFilter(types) {
        common.loader.show(SELECTOR.PANEL);
        common.reloadFilter(
            SELECTOR.PANEL,
            types,
            filter.cohort,
            filter.course,
            filter.group,
            function() {
                loadGraph();
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

        // Cohort selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COHORT}`, function() {
            filter.cohort = parseInt($(this).val());
            filter.course = 0;
            filter.group = 0;
            filter.student = 0;
            reloadFilter(['course', 'group', 'student']);
        });

        // Course selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COURSE}`, function() {
            filter.course = parseInt($(this).val());
            filter.group = 0;
            filter.student = 0;
            reloadFilter(['group', 'student']);

        });

        // Group selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.GROUP}`, function() {
            filter.group = parseInt($(this).val());
            filter.student = 0;
            reloadFilter(['student']);
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

        $(SELECTOR.PANEL).find('.singleselect').select2();
        common.handleFilterSize(SELECTOR.PANEL);
        initEvents();
        loadGraph(invalidUser);
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
            name: M.util.get_string('courseactivitystatus-submissions', 'local_edwiserreports'),
            data: response.submissions,
        }, {
            name: M.util.get_string('courseactivitystatus-completions', 'local_edwiserreports'),
            data: response.completions,
        }];
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