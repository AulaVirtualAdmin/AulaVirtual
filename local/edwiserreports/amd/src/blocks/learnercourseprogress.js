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
 * @author      Yogesh Shirsath
 * @copyright   2022 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define('local_edwiserreports/blocks/learnercourseprogress', [
    'jquery',
    'local_edwiserreports/vendor/apexcharts',
    'local_edwiserreports/common',
    'local_edwiserreports/defaultconfig',
    'local_edwiserreports/select2'
], function(
    $,
    ApexCharts,
    Common,
    CFG
) {
    /**
     * Charts list.
     */
    var chart = null;

    

    /**
     * Filter for ajax.
     */
    var filter = {
        course: 0,
        dir: $('html').attr('dir'),
        rtl: $('html').attr('dir') == 'rtl' ? 1 : 0
    };

    /**
     * Bar chart default config.
     */
    const barChartDefault = {
        series: [],
        chart: {
            type: 'bar',
            height: 350,
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
            marker: {
                show: true
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
            y: {
                title: {}
            }
        },
        grid: {
            borderColor: '#e7e7e7'
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: null,
            labels: {
                hideOverlappingLabels: true,
                trim: true,
                rotate: 300,
                minHeight: 100,
                maxHeight: 120,
            }
        },
        // xaxis: {
        //     categories: null,
        // },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetY: '-20',
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
        },
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        },
        colors: [CFG.getColorTheme()[2]]
    };

    /**
     * Legend position.
     */
    var position = filter.rtl ? 'left' : 'right';

    /**
     * Donut chart default config.
     */
    const donutChartDefault = {
        chart: {
            type: 'donut',
            height: 350
        },
        legend: {
            position: position,
            formatter: function(seriesName, opts) {
                return [seriesName + ": " + opts.w.globals.series[opts.seriesIndex]]
            }
        },
        dataLabels: {
            enabled: false
        },
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        },
        colors: CFG.getColorTheme()
    };

    /**
     * Selectors list.
     */
    var SELECTOR = {
        PANEL: '#learnercourseprogressblock',
        COURSE: '#learnercourseprogress-course-select',
        GRAPH: '#apex-chart-learnercourseprogress-block'
    };

    /**
     * All promises.
     */
    var PROMISE = {
        /**
         * Get course progress using filters.
         * @param {Object} filter Filter data
         * @returns {PROMISE}
         */
        GET_COURSEPROGRESS: function(filter) {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'get_learnercourseprogress_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter
                    })
                },
            });
        }
    }

    /**
     * Load graph
     */
    function loadGraph() {
        let data;
        Common.loader.show(SELECTOR.PANEL);

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
                Common.loader.hide(SELECTOR.PANEL);
            }, 1000);
        }

        PROMISE.GET_COURSEPROGRESS(filter)
            .done(function(response) {
                if (filter.course == 0) {
                    data = Object.assign({}, barChartDefault);
                    data.yaxis = {
                        max: 100,
                        labels: {
                            formatter: (progress) => {
                                return progress + '%';
                            }
                        }
                    };
                    data.xaxis.categories = response.labels;
                    data.series = [{
                        name: M.util.get_string('courseprogress', 'local_edwiserreports'),
                        data: response.progress,
                    }];
                    data.chart.toolbar.show = response.labels.length > 30;
                    data.chart.zoom.enabled = response.labels.length > 30;
                    data.tooltip.y.title.formatter = (title) => {
                        return M.util.get_string('progress', 'local_edwiserreports') + ': ';
                    };
                    $(SELECTOR.PANEL).find('.panel-body').attr('data-charttype', 'bar');
                } else {
                    data = Object.assign({}, donutChartDefault);
                    data.labels = response.labels;
                    data.series = response.progress;
                    data.tooltip = {
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            let value = series[seriesIndex];
                            let label = w.config.labels[seriesIndex];
                            let tooltip = value < 2 ? response.tooltip.single : response.tooltip.plural;
                            let color = w.config.colors[seriesIndex];
                            return `<div class="custom-donut-tooltip" style="color: ${color};">
                                    <span style="font-weight: 500;"> ${label}:</span>
                                    <span style="font-weight: 700;"> ${value} ${tooltip}</span>
                                </div>`;
                        }
                    }
                    $(SELECTOR.PANEL).find('.panel-body').attr('data-charttype', 'donut');
                }
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);
            }).fail(function(exception) {
                Common.loader.hide(SELECTOR.PANEL);
            });
    }

    /**
     * Initialize event listeners.
     */
    function initEvents() {

        // Course selector listener.
        $('body').on('change', `${SELECTOR.PANEL} ${SELECTOR.COURSE}`, function() {
            let courseid = parseInt($(this).val());
            filter.course = courseid;

            // Load graph data.
            loadGraph();
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

        loadGraph();
    }
    return {
        init: init
    };
});
