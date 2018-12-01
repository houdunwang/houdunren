"use strict";
// Class definition
var KProfile = function() {

    var initProfileAvatar = function() {
        var avatar = new KAvatar('k_profile_avatar');
    }

    var initStatisticCharts = function() {
        // Mini charts
        KLib.initMiniChart($('#k_profile_mini_chart_1'), [6, 12, 9,  18, 15, 9, 11, 8], KApp.getStateColor('danger'), 2);
        KLib.initMiniChart($('#k_profile_mini_chart_2'), [8, 13,  10, 14, 12,  10, 11, 14], KApp.getStateColor('brand'), 2);
        // html markup for the mini charts:  <canvas id="k_profile_mini_chart_1" width="90" height="50"></canvas>
    }

    return {
        // Init demos
        init: function() {
           initStatisticCharts(); 
           initProfileAvatar();
        }
    };
}();

// Class initialization on page load
jQuery(document).ready(function() {
    KProfile.init();
});