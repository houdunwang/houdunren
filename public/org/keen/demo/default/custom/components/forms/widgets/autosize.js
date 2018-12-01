"use strict";
// Class definition

var KAutosize = function () {
    
    // Private functions
    var demos = function () {
        // basic demo
        var demo1 = $('#k_autosize_1');
        var demo2 = $('#k_autosize_2');

        autosize(demo1);

        autosize(demo2);
        autosize.update(demo2);
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KAutosize.init();
});