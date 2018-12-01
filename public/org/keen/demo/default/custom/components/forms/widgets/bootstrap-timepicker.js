"use strict";
// Class definition

var KBootstrapTimepicker = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('#k_timepicker_1, #k_timepicker_1_modal').timepicker();

        // minimum setup
        $('#k_timepicker_2, #k_timepicker_2_modal').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
        });

        // default time
        $('#k_timepicker_3, #k_timepicker_3_modal').timepicker({
            defaultTime: '11:45:20 AM',
            minuteStep: 1,
            showSeconds: true,
            showMeridian: true
        });

        // default time
        $('#k_timepicker_4, #k_timepicker_4_modal').timepicker({
            defaultTime: '10:30:20 AM',           
            minuteStep: 1,
            showSeconds: true,
            showMeridian: true
        });

        // validation state demos
        // minimum setup
        $('#k_timepicker_1_validate, #k_timepicker_2_validate, #k_timepicker_3_validate').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KBootstrapTimepicker.init();
});