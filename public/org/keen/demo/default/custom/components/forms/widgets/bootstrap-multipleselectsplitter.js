"use strict";
// Class definition

var KBootstrapMultipleSelectsplitter = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('#k_multipleselectsplitter_1, #k_multipleselectsplitter_2').multiselectsplitter();
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KBootstrapMultipleSelectsplitter.init();
});