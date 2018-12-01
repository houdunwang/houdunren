"use strict";
// Class definition

var KBootstrapMaxlength = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('#k_maxlength_1').maxlength({
            warningClass: "k-badge k-badge--warning k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline"
        });

        // threshold value
        $('#k_maxlength_2').maxlength({
            threshold: 5,
            warningClass: "k-badge k-badge--danger k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline"
        });

        // always show
        $('#k_maxlength_3').maxlength({
            alwaysShow: true,
            threshold: 5,
            warningClass: "k-badge k-badge--primary k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        // custom text
        $('#k_maxlength_4').maxlength({
            threshold: 3,
            warningClass: "k-badge k-badge--danger k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline",
            separator: ' of ',
            preText: 'You have ',
            postText: ' chars remaining.',
            validate: true
        });

        // textarea example
        $('#k_maxlength_5').maxlength({
            threshold: 5,
            warningClass: "k-badge k-badge--primary k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        // position examples
        $('#k_maxlength_6_1').maxlength({
            alwaysShow: true,
            threshold: 5,
            placement: 'top-left',
            warningClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        $('#k_maxlength_6_2').maxlength({
            alwaysShow: true,
            threshold: 5,
            placement: 'top-right',
            warningClass: "k-badge k-badge--success k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        $('#k_maxlength_6_3').maxlength({
            alwaysShow: true,
            threshold: 5,
            placement: 'bottom-left',
            warningClass: "k-badge k-badge--warning k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        $('#k_maxlength_6_4').maxlength({
            alwaysShow: true,
            threshold: 5,
            placement: 'bottom-right',
            warningClass: "k-badge k-badge--danger k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"
        });

        // Modal Examples

        // minimum setup
        $('#k_maxlength_1_modal').maxlength({
            warningClass: "k-badge k-badge--warning k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline",
            appendToParent: true
        });

        // threshold value
        $('#k_maxlength_2_modal').maxlength({
            threshold: 5,
            warningClass: "k-badge k-badge--danger k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline",
            appendToParent: true
        });

        // always show
        // textarea example
        $('#k_maxlength_5_modal').maxlength({
            threshold: 5,
            warningClass: "k-badge k-badge--primary k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline",
            appendToParent: true
        });

        // custom text
        $('#k_maxlength_4_modal').maxlength({
            threshold: 3,
            warningClass: "k-badge k-badge--danger k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--success k-badge--rounded k-badge--inline",
            appendToParent: true,
            separator: ' of ',
            preText: 'You have ',
            postText: ' chars remaining.',
            validate: true
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
    KBootstrapMaxlength.init();
});