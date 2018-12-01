"use strict";
// Class definition

var KBlockUIDemo = function () {
    
    // Private functions

    // Basic demo
    var demo1 = function () {
        // default
        $('#k_blockui_1_1').click(function() {
            KApp.block('#k_blockui_1_content', {});

            setTimeout(function() {
                KApp.unblock('#k_blockui_1_content');
            }, 2000);
        });

        $('#k_blockui_1_2').click(function() {
            KApp.block('#k_blockui_1_content', {
                overlayColor: '#000000',
                state: 'primary'
            });  

            setTimeout(function() {
                KApp.unblock('#k_blockui_1_content');
            }, 2000);
        });

        $('#k_blockui_1_3').click(function() {
            KApp.block('#k_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_1_content');
            }, 2000);
        });

        $('#k_blockui_1_4').click(function() {
            KApp.block('#k_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_1_content');
            }, 2000);
        });

        $('#k_blockui_1_5').click(function() {
            KApp.block('#k_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_1_content');
            }, 2000);
        });
    }

    // portlet blocking
    var demo2 = function () {
        // default
        $('#k_blockui_2_1').click(function() {
            KApp.block('#k_blockui_2_portlet', {});

            setTimeout(function() {
                KApp.unblock('#k_blockui_2_portlet');
            }, 2000);
        });

        $('#k_blockui_2_2').click(function() {
            KApp.block('#k_blockui_2_portlet', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_2_portlet');
            }, 2000);
        });

        $('#k_blockui_2_3').click(function() {
            KApp.block('#k_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_2_portlet');
            }, 2000);
        });

        $('#k_blockui_2_4').click(function() {
            KApp.block('#k_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_2_portlet');
            }, 2000);
        });

        $('#k_blockui_2_5').click(function() {
            KApp.block('#k_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_2_portlet');
            }, 2000);
        });
    }

    // page blocking
    var demo3 = function () {
        // default
        $('#k_blockui_3_1').click(function() {
            KApp.blockPage();

            setTimeout(function() {
                KApp.unblockPage();
            }, 2000);
        });

        $('#k_blockui_3_2').click(function() {
            KApp.blockPage({
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KApp.unblockPage();
            }, 2000);
        });

        $('#k_blockui_3_3').click(function() {
            KApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KApp.unblockPage();
            }, 2000);
        });

        $('#k_blockui_3_4').click(function() {
            KApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KApp.unblockPage();
            }, 2000);
        });

        $('#k_blockui_3_5').click(function() {
            KApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KApp.unblockPage();
            }, 2000);
        });
    }

    // modal blocking
    var demo4 = function () {
        // default
        $('#k_blockui_4_1').click(function() {
            KApp.block('#k_blockui_4_1_modal .modal-content', {});

            setTimeout(function() {
                KApp.unblock('#k_blockui_4_1_modal .modal-content');
            }, 2000);
        });

        $('#k_blockui_4_2').click(function() {
            KApp.block('#k_blockui_4_2_modal .modal-content', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_4_2_modal .modal-content');
            }, 2000);
        });

        $('#k_blockui_4_3').click(function() {
            KApp.block('#k_blockui_4_3_modal .modal-content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_4_3_modal .modal-content');
            }, 2000);
        });

        $('#k_blockui_4_4').click(function() {
            KApp.block('#k_blockui_4_4_modal .modal-content', {
                overlayColor: '#000000',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_4_4_modal .modal-content');
            }, 2000);
        });

        $('#k_blockui_4_5').click(function() {
            KApp.block('#k_blockui_4_5_modal .modal-content', {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KApp.unblock('#k_blockui_4_5_modal .modal-content');
            }, 2000);
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2(); 
            demo3(); 
            demo4(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KBlockUIDemo.init();
});