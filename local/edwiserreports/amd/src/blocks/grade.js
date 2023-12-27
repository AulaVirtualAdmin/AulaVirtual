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
 * Grade table js.
 *
 * @package     local_edwiserreports
 * @copyright   2021 wisdmlabs <support@wisdmlabs.com>
 * @author      Yogesh Shirsath
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define('local_edwiserreports/blocks/grade', [
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/templates',
    'local_edwiserreports/vendor/apexcharts',
    'local_edwiserreports/common',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/events',
    'local_edwiserreports/select2'
], function(
    $,
    ModalFactory,
    ModalEvents,
    Templates,
    ApexCharts,
    common,
    CFG,
    EdwiserReportsEvents
) {

    let blockName = 'gradeblock';

    /**
     * Chart.
     */
    var chart = null;

    /**
     * Filter for ajax.
     */
    var filter = {
        cohort: 0,
        course: 0,
        group: 0,
        student: 0,
        dir: $('html').attr('dir')
    };

    /**
     * Selectors list.
     */
    var SELECTOR = {
        PANEL: '#gradeblock',
        COHORT: '.cohort-select',
        COURSE: '.course-select',
        GROUP: '.group-select',
        STUDENT: '.student-select',
        GRAPH: '.graph',
        GRAPHLABEL: '.graph-label',
        FORMFILTER: '.download-links [name="filter"]',
        FILTERS: '.filters'
    };

    /**
     * Legend position.
     */
    var position = 'right';

    /**
     * Ranges
     */
    var ranges = ["81to100", "61to80", "41to60", "21to40", "0to20"];

    /**
     * Pie chart default config.
     */
    const pieChartDefault = {
        plotOptions: {
            pie: {
                expandOnClick: false
            }
        },
        chart: {
            id: 'grade',
            type: 'donut',
            height: 350,
            events: {}
        },
        fill: {
            type: 'solid',
        },
        legend: {
            position: position,
            formatter: function(seriesName, opts) {
                return [seriesName + ": " + opts.w.globals.series[opts.seriesIndex]]
            }
        },
        colors: CFG.getColorTheme(),
        dataLabels: {
            enabled: false
        },
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        }
    };

    /**
     * All promises.
     */
    var PROMISE = {
        /**
         * Get graph data using filters.
         * @returns {PROMISE}
         */
        GET_GRAPH_DATA: function() {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_grade_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter
                    })
                },
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
                    action: 'get_grade_modal_data',
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
     * Create Grade Table.
     * @param {string} range Grade range.
     * @param {string} title Modal title.
     */
    function createGradeTable(range, title) {
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
    function loadGraph() {
        let data;
        common.loader.show(SELECTOR.PANEL);

        // Set export filter to download link.
        $(SELECTOR.PANEL).find(SELECTOR.FORMFILTER).val(JSON.stringify(filter));

        PROMISE.GET_GRAPH_DATA()
            .done(function(response) {
                data = Object.assign({}, pieChartDefault);
                data.legend.position = position;
                if (response.labels.length != 0) {
                    data.labels = response.labels.reverse();
                    data.series = response.grades.reverse();
                } else {
                    data.labels = [];
                    data.series = [];
                }
                $(SELECTOR.PANEL).find(SELECTOR.GRAPH).data(
                    'responseTitle',
                    M.util.get_string(response.header, 'local_edwiserreports')
                );
                data.responseTitle = M.util.get_string(response.header, 'local_edwiserreports');
                data.tooltip = {
                    custom: function({ series, seriesIndex, dataPointIndex, w }) {
                        let value = series[seriesIndex];
                        let tooltip = value < 2 ? response.tooltip.single : response.tooltip.plural;
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
                };
                data.chart.events.updated = data.chart.events.mounted = function() {
                    if (response.labels.length != 0) {
                        $(SELECTOR.PANEL).find(SELECTOR.GRAPH).find('.apexcharts-legend')
                            .prepend(`
                                <label class="graph-label w-100 text-center">
                                    ${$(SELECTOR.PANEL).find(SELECTOR.GRAPH).data('responseTitle')}
                                </label>
                            `);
                    }
                };
                data.chart.events.dataPointSelection = function(event, chartContext, config) {
                    createGradeTable(config.dataPointIndex, $(SELECTOR.PANEL).find(SELECTOR.GRAPH).data('responseTitle'));
                };
                common.insight('#gradeblock .insight', {
                    'insight': {
                        'value': common.toPrecision(response.average, 2) + '%',
                        'title': 'averagegrade'
                    }
                });
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);
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
     * Initialize event listeners.
     */
    function initEvents() {

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
            let width = $(SELECTOR.PANEL).find(SELECTOR.GRAPH).width();
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
    }

    /**
     * Initialize
     * @param {function} invalidUser Callback function
     */
    function init(invalidUser) {
        if ($(SELECTOR.PANEL).length == 0) {
            return;
        }
        $(SELECTOR.PANEL).find('.singleselect').select2();
        initEvents();
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
        data = Object.assign({}, pieChartDefault);
        data.legend.position = position;
        if (response.labels.length != 0) {
            data.labels = response.labels.reverse();
            data.series = response.grades.reverse();
        } else {
            data.labels = [];
            data.series = [];
        }
        $(SELECTOR.PANEL).find(SELECTOR.GRAPH).data(
            'responseTitle',
            M.util.get_string(response.header, 'local_edwiserreports')
        );
        data.responseTitle = M.util.get_string(response.header, 'local_edwiserreports');
        data.tooltip = {
            enabled: false
        };
        data.chart.animations = {
            enabled: false
        };
        data.chart.events = {
            mounted: function() {
                if (response.labels.length != 0) {
                    $(SELECTOR.PANEL).find(SELECTOR.GRAPH).find('.apexcharts-legend')
                        .prepend(`<label class="graph-label w-100 text-center font-weight-700">${$(SELECTOR.PANEL).find(SELECTOR.GRAPH).data('responseTitle')}</label>`);
                }
            }
        };
        data.chart.events.updated = data.chart.events.mounted;
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

    return {
        init: init,
        download: download
    };
});
