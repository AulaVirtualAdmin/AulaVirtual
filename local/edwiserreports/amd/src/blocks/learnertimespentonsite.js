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
define('local_edwiserreports/blocks/learnertimespentonsite', [
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
     * Date picker.
     */
    var flatpickr = null;

    /**
     * Charts list.
     */
    var chart = null;

    /**
     * Filter for ajax.
     */
    var filter = {
        date: 'last7days',
        dir: $('html').attr('dir')
    };

    /**
     * Line chart default config.
     */
    const lineChartDefault = {
        series: [],
        chart: {
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
        colors: [CFG.getColorTheme()[2]]
    };

    /**
     * Pie chart default config.
     */
    const pieChartDefault = {
        chart: {
            type: 'donut',
            height: 350
        },
        legend: {
            position: 'bottom',
            offsetY: 0
        },
        noData: {
            text: M.util.get_string('nographdata', 'local_edwiserreports')
        },
        theme: {
            monochrome: {
                enabled: true,
                color: CFG.getColorTheme()[2],
                shadeTo: 'light',
                shadeIntensity: 0.65
            },
        }
    };

    /**
     * Selectors list.
     */
    var SELECTOR = {
        PANEL: '#learnertimespentonsiteblock',
        DATE: '.learnertimespentonsite-calendar',
        DATEMENU: '.learnertimespentonsite-calendar + .dropdown-menu',
        DATEITEM: '.learnertimespentonsite-calendar + .dropdown-menu .dropdown-item',
        DATEPICKER: '.learnertimespentonsite-calendar + .dropdown-menu .dropdown-calendar',
        DATEPICKERINPUT: '.learnertimespentonsite-calendar + .dropdown-menu .flatpickr',
        GRAPH: '#apex-chart-learnertimespentonsite-block',
    };

    /**
     * All promises.
     */
    var PROMISE = {
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
                    action: 'get_learnertimespentonsite_graph_data_ajax',
                    secret: M.local_edwiserreports.secret,
                    lang: $('html').attr('lang'),
                    data: JSON.stringify({
                        filter: filter
                    })
                },
            });
        },
    }

    /**
     * Load graph
     */
    function loadGraph() {
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
        PROMISE.GET_TIMESPENTONSITE(filter)
            .done(function(response) {
                let data;
                if (filter.date.includes(" to ") || ['last7days', 'weekly', 'monthly', 'yearly'].indexOf(filter.date) !== -1) {
                    data = Object.assign({}, lineChartDefault);
                    data.yaxis = {
                        labels: {
                            formatter: Common.timeFormatter
                        }
                    };
                    data.xaxis.categories = response.dates.map(date => date * 86400000);
                    data.series = [{
                        name: M.util.get_string('timespentonlms', 'local_edwiserreports'),
                        data: response.timespent,
                    }];
                    data.chart.toolbar.show = response.dates.length > 29;
                    data.chart.zoom.enabled = response.dates.length > 29;
                    data.tooltip.y.title.formatter = (title) => {
                        return M.util.get_string('time', 'local_edwiserreports') + ': ';
                    }
                    $(SELECTOR.PANEL).find('.panel-body').attr('data-charttype', 'line');
                } else {
                    data = Object.assign({}, pieChartDefault);
                    data.labels = response.labels;
                    data.series = response.timespent;
                    data.tooltip = {
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            let value = Common.timeFormatter(series[seriesIndex], {
                                dataPointIndex: dataPointIndex
                            });
                            let label = w.config.labels[seriesIndex];
                            return `<div class="custom-donut-tooltip theme-2-text">
                                    <span style="font-weight: 500;"> ${label}:</span>
                                    <span style="font-weight: 700;"> ${value} </span>
                                </div>`;
                        }
                    };
                    data.legend = {
                        show: false
                    };
                    $(SELECTOR.PANEL).find('.panel-body').attr('data-charttype', 'donut');
                }
                renderGraph($(SELECTOR.PANEL).find(SELECTOR.GRAPH), data);
                Common.loader.hide(SELECTOR.PANEL);
            }).fail(function(exception) {
                Common.loader.hide(SELECTOR.PANEL);
            });
    }

    /**
     * After Select Custom date get active users details.
     * @param {String} target Targeted graph
     */
    function customDateSelected(target) {
        let date = $(SELECTOR.PANEL).find(SELECTOR.DATEPICKERINPUT).val(); // Y-m-d format
        let dateAlternate = $(SELECTOR.PANEL).find(SELECTOR.DATEPICKERINPUT).next().val(); // d/m/Y format

        /* If correct date is not selected then return false */
        if (date == '') {
            return;
        }

        // RTL support
        
        // Formating date for rtl
        if(filter.dir == 'rtl'){
            // Split string in 2 parts
            if(dateAlternate.includes('to')){
                let stringarr = dateAlternate.split('to');
                // format for rtl : yyyy mm dd
                let startdate = stringarr[0].split('/');
                let enddate = stringarr[1].split('/');

                startdate = startdate[2] + '/' + startdate[1] + '/' + startdate[0];
                enddate = enddate[2] + '/' + enddate[1] + '/' + enddate[0];
                dateAlternate = enddate + '-' + startdate;
            } else{
                // format for rtl : yyyy mm dd
                let startdate = dateAlternate.split('/');

                startdate = startdate[2] + '/' + startdate[1] + '/' + startdate[0];
                dateAlternate = startdate;
            }

            // Making direction ltr for date selector and aligning text to right
            $(SELECTOR.DATE).css({'direction':'ltr','text-align': 'right'});
            $(SELECTOR.DATEPICKERINPUT).css({'direction':'ltr','text-align': 'right'});
        }


        // Set active class to custom date selector item.
        $(SELECTOR.PANEL).find(SELECTOR.DATEITEM).removeClass('active');
        $(SELECTOR.PANEL).find(SELECTOR.DATEITEM + '.custom').addClass('active');

        // Show custom date to dropdown button.
        $(SELECTOR.PANEL).find(SELECTOR.DATE).html(dateAlternate);
        filter.date = date;
        loadGraph(target);
    }

    /**
     * Initialize event listeners.
     */
    function initEvents() {

        flatpickr = $(SELECTOR.PANEL).find(SELECTOR.DATEPICKERINPUT).flatpickr({
            mode: 'range',
            altInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            maxDate: "today",
            appendTo: $(SELECTOR.PANEL).find(SELECTOR.DATEPICKER).get(0),
            onOpen: function() {
                $(SELECTOR.PANEL).find(SELECTOR.DATEMENU).addClass('withcalendar');
            },
            onClose: function() {
                $(SELECTOR.PANEL).find(SELECTOR.DATEMENU).removeClass('withcalendar');
                customDateSelected();
            }
        });

        /* Date selector listener */
        $('body').on('click', SELECTOR.DATEITEM + ":not(.custom)", function() {
            // Set custom selected item as active.
            $(SELECTOR.PANEL).find(SELECTOR.DATEITEM).removeClass('active');
            $(this).addClass('active');

            // Show selected item on dropdown button.
            $(SELECTOR.PANEL).find(SELECTOR.DATE).html($(this).text());

            // Set date.
            filter.date = $(this).data('value');

            // Load graph data.
            loadGraph();
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

        if ($(SELECTOR.PANEL).length == 0) {
            return;
        }

        initEvents();

        loadGraph();
    }
    return {
        init: init
    };
});
