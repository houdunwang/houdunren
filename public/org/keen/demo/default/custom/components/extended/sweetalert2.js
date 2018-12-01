"use strict";
// Class definition
var KSweetAlert2Demo = function() {

    // Demos
    var initDemos = function() {
        // Sweetalert Demo 1
        $('#k_sweetalert_demo_1').click(function(e) {
            swal('Good job!');
        });

        // Sweetalert Demo 2
        $('#k_sweetalert_demo_2').click(function(e) {
            swal("Here's the title!", "...and here's the text!");
        });

        // Sweetalert Demo 3
        $('#k_sweetalert_demo_3_1').click(function(e) {
            swal("Good job!", "You clicked the button!", "warning");
        });

        $('#k_sweetalert_demo_3_2').click(function(e) {
            swal("Good job!", "You clicked the button!", "error");
        });

        $('#k_sweetalert_demo_3_3').click(function(e) {
            swal("Good job!", "You clicked the button!", "success");
        });

        $('#k_sweetalert_demo_3_4').click(function(e) {
            swal("Good job!", "You clicked the button!", "info");
        });

        $('#k_sweetalert_demo_3_5').click(function(e) {
            swal("Good job!", "You clicked the button!", "question");
        });

        // Sweetalert Demo 4
        $('#k_sweetalert_demo_4').click(function(e) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                confirmButtonText: "Confirm me!",
                confirmButtonClass: "btn btn-focus k-btn k-btn--pill k-btn--air"
            });
        });

        // Sweetalert Demo 5
        $('#k_sweetalert_demo_5').click(function(e) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",

                confirmButtonText: "<span><i class='la la-headphones'></i><span>I am game!</span></span>",
                confirmButtonClass: "btn btn-danger k-btn k-btn--pill k-btn--air k-btn--icon",

                showCancelButton: true,
                cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                cancelButtonClass: "btn btn-secondary k-btn k-btn--pill k-btn--icon"
            });
        });

        $('#k_sweetalert_demo_6').click(function(e) {
            swal({
                position: 'top-right',
                type: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            });
        });

        $('#k_sweetalert_demo_7').click(function(e) {
            swal({
                title: 'jQuery HTML example',
                html: $('<div>')
                    .addClass('some-class')
                    .text('jQuery is everywhere.'),
                animation: false,
                customClass: 'animated tada'
            })
        });

        $('#k_sweetalert_demo_8').click(function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        });

        $('#k_sweetalert_demo_9').click(function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            });
        });

        $('#k_sweetalert_demo_10').click(function(e) {
            swal({
                title: 'Sweet!',
                text: 'Modal with a custom image.',
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: false
            });
        });

        $('#k_sweetalert_demo_11').click(function(e) {
            swal({
                title: 'Auto close alert!',
                text: 'I will close in 5 seconds.',
                timer: 5000,
                onOpen: function() {
                    swal.showLoading()
                }
            }).then(function(result) {
                if (result.dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            })
        });
    };

    return {
        // Init
        init: function() {
            initDemos();
        },
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KSweetAlert2Demo.init();
});