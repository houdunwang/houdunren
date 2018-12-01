"use strict";
// Class definition
var KAvatarDemo = function() {

    return {
        // Init demos
        init: function() {
           var avatar1 = new KAvatar('k_profile_avatar_1');
           var avatar2 = new KAvatar('k_profile_avatar_2');
           var avatar3 = new KAvatar('k_profile_avatar_3');
           var avatar4 = new KAvatar('k_profile_avatar_4');
        }
    };
}();

// Class initialization on page load
jQuery(document).ready(function() {
    KAvatarDemo.init();
});