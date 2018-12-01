"use strict";
// Class definition
var KBootstrapTouchspin = function() {

    // Private functions
    var demos = function() {
        // minimum setup
        $('#k_touchspin_1, #k_touchspin_2_1').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
        });

        // with prefix
        $('#k_touchspin_2, #k_touchspin_2_2').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });

        // vertical button alignment:
        $('#k_touchspin_3, #k_touchspin_2_3').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            postfix: '$'
        });

        // vertical buttons with custom icons:
        $('#k_touchspin_4, #k_touchspin_2_4').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            verticalbuttons: true,
            verticalupclass: 'la la-plus',
            verticaldownclass: 'la la-minus'
        });

        // vertical buttons with custom icons:
        $('#k_touchspin_5, #k_touchspin_2_5').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            verticalbuttons: true,
            verticalupclass: 'la la-angle-up',
            verticaldownclass: 'la la-angle-down'
        });
    }

    var validationStateDemos = function() {
        // validation state demos
        $('#k_touchspin_1_validate').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });

        // vertical buttons with custom icons:
        $('#k_touchspin_2_validate').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
        });

        $('#k_touchspin_3_validate').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            verticalbuttons: true,
            verticalupclass: 'la la-plus',
            verticaldownclass: 'la la-minus'
        });
    }

    return {
        // public functions
        init: function() {
            demos();
            validationStateDemos();
        }
    };
}();

jQuery(document).ready(function() {
    KBootstrapTouchspin.init();
});