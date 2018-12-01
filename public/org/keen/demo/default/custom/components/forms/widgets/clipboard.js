"use strict";
// Class definition

var KClipboardDemo = function () {
    
    // Private functions
    var demos = function () {
        // basic example
        new Clipboard('[data-clipboard=true]').on('success', function(e) {
            e.clearSelection();
            alert('Copied!');
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
    KClipboardDemo.init();
});