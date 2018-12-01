"use strict";
var KPortletDraggable = function () {

    return {
        //main function to initiate the module
        init: function () {
            $("#k_sortable_portlets").sortable({
                connectWith: ".k-portlet__head",
                items: ".k-portlet", 
                opacity: 0.8,
                handle : '.k-portlet__head',
                coneHelperSize: true,
                placeholder: 'k-portlet--sortable-placeholder',
                forcePlaceholderSize: true,
                tolerance: "pointer",
                helper: "clone",
                cancel: ".k-portlet--sortable-empty", // cancel dragging if portlet is in fullscreen mode
                revert: 250, // animation in milliseconds
                update: function(b, c) {
                    if (c.item.prev().hasClass("k-portlet--sortable-empty")) {
                        c.item.prev().before(c.item);
                    }                    
                }
            });
        }
    };
}();

jQuery(document).ready(function() {
    KPortletDraggable.init();
});