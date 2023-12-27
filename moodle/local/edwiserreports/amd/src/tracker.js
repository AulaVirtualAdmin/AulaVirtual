define([
    'jquery',
    'core/ajax',
    'core/notification',
    './defaultconfig'
], function(
    $,
    Ajax,
    Notification,
    CFG
) {

    /**
     * All ajax promises.
     */
    let PROMISES = {

        /**
         * Check if plugin is installed.
         * @returns {PROMISE}
         */
        IS_INSTALLED: function() {
            return $.ajax({
                url: CFG.requestUrl,
                type: CFG.requestType,
                dataType: CFG.requestDataType,
                data: {
                    action: 'is_installed_ajax'
                },
            });
        },

        /**
         * Fetch tracking details using context id.
         * @param {Integer} contextid Current page context id
         * @returns {PROMISE}
         */
        GET_TRACKING_DETAILS: function(contextid) {
            return Ajax.call([{
                methodname: 'local_edwiserreports_get_tracking_details',
                args: {
                    contextid: contextid
                }
            }])[0];
        },

        /**
         * Send keep alive request for current activity.
         * @returns {PROMISE}
         */
        KEEP_ALIVE: function(time) {
            return Ajax.call([{
                methodname: 'local_edwiserreports_keep_alive',
                args: {
                    id: id,
                    time: time
                }
            }], true, false, true)[0];
        }
    };

    /**
     * Time tracking id.
     */
    let id = null;

    /**
     * Seconds Ticker variable.
     */
    let ticker = null;

    /**
     * Global variable which keeps track of time.
     */
    let time = 0;

    /**
     * Time tracking frequency.
     */
    let frequency = null;

    /**
     * Update spend time to db.
     */
    function updateTime() {
        if (id === null || time === 0) {
            return;
        }
        PROMISES.KEEP_ALIVE(time);
        time = 0;
    }

    /**
     * Start timers.
     */
    function startTimers() {
        if (id === null) {
            return;
        }

        // Seconds Increament.
        ticker = setInterval(function() {
            time++;
            if (time >= frequency) {
                updateTime();
            }
        }, 1000);
    }

    function intiEvents() {

        // Update time on page close/unload.
        window.addEventListener('beforeunload', function(event) {
            updateTime();
            clearInterval(ticker);
        });

        // Handling tab visibility.
        document.addEventListener("visibilitychange", (event) => {
            if (document.visibilityState == "visible") {
                startTimers();
            } else {
                clearInterval(ticker);
            }
        });

        // Start the initial timers.
        if (document.visibilityState == "visible") {
            startTimers();
        }
    }

    /**
     * Initialize
     */
    function init() {
        PROMISES.GET_TRACKING_DETAILS(M.cfg.contextid)
            .done(function(response) {
                if (response.status === false) {
                    return;
                }

                // Current tracking id.
                id = response.id;

                // Frequency.
                frequency = response.frequency;

                // Initialize events listener.
                intiEvents();

            }).fail(Notification.exception);
    }
    return {
        init: function() {
            // Dirty hack to skip multiple initialization.
            if (window['timerinit'] !== undefined) {
                return;
            }
            window['timerinit'] = true;
            PROMISES.IS_INSTALLED()
                .done(function(response) {
                    if (response.installed) {
                        init();
                    }
                });
        }
    };
});

window.addEventListener('load',
    function() {
        require(['local_edwiserreports/tracker'], function(tracker) {
            tracker.init();
        });
    }, false
);
