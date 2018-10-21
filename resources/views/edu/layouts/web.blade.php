<!doctype html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Hello, world!</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('org/front/vendor')}}/bootstrap/css/bootstrap.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('org/front/vendor')}}//font-awesome/css/fontawesome-all.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('org/front/css/front.css')}}">
    <link rel="stylesheet" href="{{asset('org/front/vendor/slick-carousel/slick/slick.css')}}">
</head>

<body>
<!-- Hero Section -->
<div class="d-lg-flex align-items-lg-center position-relative min-height-100vh--lg u-bg-img-hero u-space-3 u-space-5-top--md u-space-0--lg" style="background-image: url({{asset('org/front')}}/img/1920x1080/img32.jpg);">
    <div class="container mt-lg-5">
        <div class="w-lg-35 mb-5">
            <h1 class="display-4 text-white">Sell your <strong class="font-weight-bold">house</strong> online</h1>
        </div>

        <div class="w-lg-65">
            <!-- Signup Form -->
            <form class="js-validate">
                <div class="row form-row">
                    <div class="col-sm-5 mb-4">
                        <!-- Input -->
                        <div class="js-form-message">
                            <div class="js-focus-state input-group u-form u-form--no-brd">
                                <input class="form-control u-form__input" type="email" name="email" required
                                       placeholder="Email"
                                       aria-label="Email"
                                       data-msg="Please enter a valid email address."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-sm-5 mb-4">
                        <!-- Input -->
                        <div class="js-form-message">
                            <div class="js-focus-state input-group u-form u-form--no-brd">
                                <input class="form-control u-form__input" type="password" name="password" required
                                       placeholder="Password"
                                       aria-label="Password"
                                       data-msg="Please enter password."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-sm-2 mb-4">
                        <button type="submit" class="btn btn-block btn-primary u-btn-primary transition-3d-hover">Signup</button>
                    </div>
                </div>

                <!-- Checkbox -->
                <div class="js-form-message mb-5">
                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                        <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required
                               data-msg="Please accept our Terms and Conditions."
                               data-error-class="u-has-error"
                               data-success-class="u-has-success">
                        <label class="custom-control-label text-white" for="termsCheckbox">
                            <small>
                                I agree to the
                                <a class="u-link-white" href="../../html/pages/terms.html">Terms and Conditions</a>
                            </small>
                        </label>
                    </div>
                </div>
                <!-- End Checkbox -->
            </form>
            <!-- End Signup Form -->
        </div>
    </div>

    <!-- Clients -->
    <div class="container position-absolute-bottom-0 u-space-2">
        <div class="js-slick-carousel u-slick"
             data-autoplay="true"
             data-speed="5000"
             data-infinite="true"
             data-slides-show="6"
             data-responsive='[{
           "breakpoint": 1200,
           "settings": {
             "slidesToShow": 4
           }
         }, {
           "breakpoint": 992,
           "settings": {
             "slidesToShow": 4
           }
         }, {
           "breakpoint": 768,
           "settings": {
             "slidesToShow": 3
           }
         }, {
           "breakpoint": 576,
           "settings": {
             "slidesToShow": 3
           }
         }, {
           "breakpoint": 480,
           "settings": {
             "slidesToShow": 2
           }
         }]'>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/airbnb-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/paypal-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/mapbox-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/boring-company-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/google-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/embark-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/spotify-white.svg" alt="Image Description">
            </div>
            <div class="js-slide">
                <img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/stripe-white.svg" alt="Image Description">
            </div>
        </div>
    </div>
    <!-- End Clients -->
</div>
<!-- End Hero Section -->

<!-- JS Global Compulsory -->
<script src="{{asset('org/front/vendor')}}/jquery/dist/jquery.min.js"></script>
<script src="{{asset('org/front/vendor')}}/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('org/front/vendor')}}/bootstrap/bootstrap.min.js"></script>

<!-- JS Front -->
<script src="{{asset('org/front/js/hs.core.js')}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset('org/front/vendor/slick-carousel/slick/slick.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
    });
</script>
<script>
    {{--require([--}}
        {{--"{{asset('org/front/vendor')}}/popper.js/dist/umd/popper.min.js",--}}
        {{--"{{asset('org/front/vendor')}}/bootstrap/bootstrap.min.js",--}}
        {{--"{{asset('org/front/js/hs.core.js')}}"--}}
    {{--],function(){--}}

    {{--})--}}
</script>
</body>
</html>