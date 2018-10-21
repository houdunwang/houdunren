@extends('edu.layouts.master')

@section('content')
    <!-- Skippy -->
    <a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
        <div class="container">
            <span class="u-skiplink-text">Skip to main content</span>
        </div>
    </a>
    <!-- End Skippy -->
    <!-- ========== HEADER ========== -->

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Hero Section -->
        <div class="d-lg-flex align-items-lg-center position-relative min-height-100vh--lg u-bg-img-hero u-space-3 u-space-5-top--md u-space-0--lg"
             style="background-image: url(/images/img32.jpg);min-height: 70vh">
            <div class="container mt-lg-5">
                <div class="w-lg-35 mb-5">
                    <h1 class="display-4 text-white">使用 <strong class="font-weight-bold">实战教程</strong> 带你学会编程</h1>
                    <a class="btn btn-sm btn-primary u-btn-primary transition-3d-hover mt-3"
                       href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/"
                       target="_blank">
                        开始学习
                    </a>
                    <a class="btn btn-sm btn-light u-btn-primary transition-3d-hover mt-3"
                       href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/"
                       target="_blank">
                        社区交流
                    </a>
                </div>
            </div>

            <!-- Clients -->
        {{--<div class="container position-absolute-bottom-0 u-space-2">--}}
        {{--<div class="js-slick-carousel u-slick"--}}
        {{--data-autoplay="true"--}}
        {{--data-speed="5000"--}}
        {{--data-infinite="true"--}}
        {{--data-slides-show="6"--}}
        {{--data-responsive='[{--}}
        {{--"breakpoint": 1200,--}}
        {{--"settings": {--}}
        {{--"slidesToShow": 4--}}
        {{--}--}}
        {{--}, {--}}
        {{--"breakpoint": 992,--}}
        {{--"settings": {--}}
        {{--"slidesToShow": 4--}}
        {{--}--}}
        {{--}, {--}}
        {{--"breakpoint": 768,--}}
        {{--"settings": {--}}
        {{--"slidesToShow": 3--}}
        {{--}--}}
        {{--}, {--}}
        {{--"breakpoint": 576,--}}
        {{--"settings": {--}}
        {{--"slidesToShow": 3--}}
        {{--}--}}
        {{--}, {--}}
        {{--"breakpoint": 480,--}}
        {{--"settings": {--}}
        {{--"slidesToShow": 2--}}
        {{--}--}}
        {{--}]'>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/airbnb-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/paypal-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/mapbox-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/boring-company-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/google-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/embark-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/spotify-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--<div class="js-slide">--}}
        {{--<img class="u-clients ml-0" src="{{asset('org/front')}}/svg/clients-logo/stripe-white.svg" alt="Image Description">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <!-- End Clients -->
        </div>
        <!-- End Hero Section -->

        <!-- Icon Blocks Section -->
        <div class="u-bg-light-blue-50">
            {{--视频播放--}}
            {{--<div class="d-flex justify-content-center pt-5">--}}
            {{--<a class="js-fancybox media align-items-center u-media-player" href="javascript:;"--}}
            {{--data-src="//vimeo.com/167434033"--}}
            {{--data-speed="700"--}}
            {{--data-animate-in="zoomIn"--}}
            {{--data-animate-out="zoomOut"--}}
            {{--data-caption="向军大叔聊编程">--}}
            {{--<span class="d-flex mr-3">--}}
            {{--<span class="u-media-player__icon u-media-player__icon--primary">--}}
            {{--<span class="fa fa-play u-media-player__icon-inner"></span>--}}
            {{--</span>--}}
            {{--</span>--}}
            {{--<span class="media-body"></span>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--视频播放结束--}}
            <div class="container u-space-3">
                <!-- Title -->
                <div class="w-md-60 w-lg-35 text-center mx-auto mb-9">
                    <h2 class="h5 font-weight-normal">
                        我们的系统课程从零基础开始教你掌握一门 <span class="text-primary font-weight-bold">编程语言.</span>
                    </h2>
                </div>
                <!-- End Title -->

                <div class="row justify-content-lg-center">
                    <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                        <!-- Icon Block -->
                        <article class="bg-white text-center border rounded p-7">
                            <!-- SVG Icon -->
                            <figure class="w-75 mx-auto mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                     y="0px"
                                     viewBox="0 0 149.5 116.1" style="enable-background:new 0 0 149.5 116.1;"
                                     xml:space="preserve">
                  <path class="u-fill-light-blue-50" d="M74.8,0.4C33.5,0.4,0,33.9,0,75.1c0,15,4.5,29,12.1,40.8h125.3c7.6-11.7,12.1-25.7,12.1-40.8
                    C149.5,33.9,116,0.4,74.8,0.4z"/>
                                    <g id="XMLID_sh507_">
                                        <polygon id="XMLID_sh363_" class="u-fill-primary-lighter" opacity=".4"
                                                 points="79.9,65.9 19.6,65.9 14.4,73.1 85,73.1  "/>
                                        <polyline id="XMLID_sh362_" class="u-fill-none u-stroke-primary"
                                                  stroke-miterlimit="10" points="85,73.1 79.9,65.9 19.6,65.9 14.4,73.1   "/>
                                        <polygon id="XMLID_sh359_" class="u-fill-none u-stroke-primary"
                                                 stroke-miterlimit="10"
                                                 points="65.6,73 33.9,73 14.5,73 14.5,115.5 84.9,115.5 84.9,73  "/>
                                        <rect id="XMLID_sh358_" x="18.2" y="78.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh357_" x="25.1" y="78.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh356_" x="18.2" y="86.9" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh355_" x="25.1" y="86.9" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh354_" x="18.2" y="95.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh353_" x="25.1" y="95.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="6.1"/>
                                        <rect id="XMLID_sh352_" x="14.9" y="74" class="u-fill-primary" opacity=".3"
                                              width="56.7" height="2.6"/>
                                        <rect id="XMLID_sh351_" x="13.5" y="72.8" class="u-fill-light-blue-100" width="58"
                                              height="2.6"/>
                                        <rect id="XMLID_sh350_" x="13.5" y="72.8" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="58" height="2.6"/>
                                        <rect id="XMLID_sh349_" x="31.5" y="76.6" class="u-fill-primary" opacity=".3"
                                              width="5.9" height="38.9"/>
                                        <rect id="XMLID_sh348_" x="33.2" y="61.4" class="u-fill-white" width="33.6"
                                              height="53.7"/>
                                        <rect id="XMLID_sh347_" x="33.1" y="61.8" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="33.6" height="53.7"/>
                                        <rect id="XMLID_sh346_" x="33.5" y="61.6" class="u-fill-primary" opacity=".3"
                                              width="32.9" height="3.1"/>
                                        <rect id="XMLID_sh345_" x="31.5" y="60.1" class="u-fill-light-blue-100" width="36.9"
                                              height="3.1"/>
                                        <polyline id="XMLID_sh344_" class="u-fill-none u-stroke-primary"
                                                  stroke-miterlimit="10"
                                                  points="65.1,63.2 31.5,63.2 31.5,60.1 64.3,60.1   "/>
                                        <rect id="XMLID_sh343_" x="43.6" y="67" class="u-fill-primary-lighter" opacity=".4"
                                              width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh340_" x="51.8" y="67.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh339_" x="43.6" y="79.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh335_" x="51.8" y="79.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh332_" x="35.4" y="79" class="u-fill-primary-lighter" opacity=".4"
                                              width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh331_" x="35.2" y="67" class="u-fill-primary-lighter" opacity=".4"
                                              width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh330_" x="60.1" y="67.1" class="u-fill-primary-lighter"
                                              opacity=".4" width="4.4" height="9.2"/>
                                        <rect id="XMLID_sh329_" x="60" y="79" class="u-fill-primary-lighter" opacity=".4"
                                              width="4.4" height="9.2"/>
                                        <path id="XMLID_sh328_" class="u-fill-white"
                                              d="M55.7,115.3H44.4v-8.1c0-3.1,2.5-5.6,5.6-5.6l0,0c3.1,0,5.6,2.5,5.6,5.6V115.3z"/>
                                        <path id="XMLID_sh327_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M55.7,115.3H44.4v-8.1c0-3.1,2.5-5.6,5.6-5.6l0,0c3.1,0,5.6,2.5,5.6,5.6V115.3z"/>
                                        <line id="XMLID_sh326_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              x1="50" y1="101.9" x2="50" y2="115.3"/>
                                        <rect id="XMLID_sh324_" x="36.2" y="64.7" class="u-fill-primary" opacity=".3"
                                              width="3" height="50.9"/>
                                        <rect id="XMLID_sh323_" x="60.5" y="64.7" class="u-fill-primary" opacity=".3"
                                              width="3.1" height="50.9"/>
                                        <rect id="XMLID_sh319_" x="37.4" y="63.2" class="u-fill-white" width="4.1"
                                              height="52.4"/>
                                        <rect id="XMLID_sh317_" x="40" y="63.2" class="u-fill-primary-lighter"
                                              opacity=".075" width="1.1" height="52.4"/>
                                        <rect id="XMLID_sh316_" x="37.4" y="63.2" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="4.1" height="52.4"/>
                                        <rect id="XMLID_sh315_" x="58.3" y="63.2" class="u-fill-white" width="4.1"
                                              height="52.4"/>
                                        <rect id="XMLID_sh313_" x="58.3" y="63.2" class="u-fill-primary-lighter"
                                              opacity=".075" width="1.3" height="52.4"/>
                                        <rect id="XMLID_sh312_" x="58.3" y="63.2" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="4.1" height="52.4"/>
                                        <polygon id="XMLID_sh311_" class="u-fill-primary-lighter" opacity=".075"
                                                 points="70.9,60.4 29.2,60.4 50,45.2  "/>
                                        <polyline id="XMLID_sh310_" class="u-fill-none u-stroke-primary"
                                                  stroke-miterlimit="10" points="65.1,60.4 29.2,60.4 50,45.2 65.5,56.5   "/>
                                        <line id="XMLID_sh309_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="23.1" y1="101.8" x2="17.6"
                                              y2="101.8"/>
                                        <line id="XMLID_sh308_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="30" y1="101.8" x2="24.5"
                                              y2="101.8"/>
                                        <line id="XMLID_sh307_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="23.1" y1="93" x2="17.6"
                                              y2="93"/>
                                        <line id="XMLID_sh306_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="30" y1="93" x2="24.5" y2="93"/>
                                        <line id="XMLID_sh304_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="23.1" y1="84.1" x2="17.6"
                                              y2="84.1"/>
                                        <line id="XMLID_sh303_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="30" y1="84.1" x2="24.5"
                                              y2="84.1"/>
                                        <line id="XMLID_sh301_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="48.4" y1="88.3" x2="43"
                                              y2="88.3"/>
                                        <line id="XMLID_sh300_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="57" y1="88.3" x2="51.5"
                                              y2="88.3"/>
                                        <line id="XMLID_sh299_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="48.4" y1="76.2" x2="43"
                                              y2="76.2"/>
                                        <line id="XMLID_sh295_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="36.8" y1="76.2" x2="34.7"
                                              y2="76.2"/>
                                        <line id="XMLID_sh294_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="36.8" y1="88.2" x2="34.7"
                                              y2="88.2"/>
                                        <line id="XMLID_sh291_" class="u-fill-none u-stroke-primary" opacity=".7"
                                              stroke-width="1.5" stroke-miterlimit="10" x1="57" y1="76.2" x2="51.5"
                                              y2="76.2"/>
                                    </g>
                                    <g id="XMLID_sh142_">
                                        <path id="XMLID_sh198_" class="u-fill-primary-lighter" opacity=".075" d="M119.7,20.5h-0.1c-0.5-1.7-2.1-3-4-3c-0.8,0-1.6,0.2-2.2,0.7c-0.4-2.7-2.7-4.8-5.6-4.8
                      c-2.5,0-4.7,1.7-5.4,4c-0.3-0.1-0.7-0.1-1-0.1c-1.9,0-3.5,1.4-3.8,3.3H97c-1.6,0-2.9,1.3-2.9,2.9v0.2c0,1.6,1.3,2.9,2.9,2.9h22.7
                      c1.6,0,2.9-1.3,2.9-2.9v-0.2C122.6,21.8,121.3,20.5,119.7,20.5z"/>
                                        <path id="XMLID_sh192_" class="u-fill-primary-lighter" opacity=".075" d="M101,26.4H97c-1.6,0-2.9-1.3-2.9-2.9v-0.2c0-1.6,1.3-2.9,2.9-2.9h0.6c0.3-1.8,1.9-3.3,3.8-3.3
                      c0.3,0,0.7,0.1,1,0.1c0.7-2.3,2.9-4,5.4-4c2.8,0,5.1,2.1,5.6,4.8c0.6-0.4,1.4-0.7,2.2-0.7c1.9,0,3.5,1.3,4,3h0.1
                      c1.6,0,2.9,1.3,2.9,2.9v0.2c0,1.6-1.3,2.9-2.9,2.9h-4.4H101z"/>
                                    </g>
                                    <g id="XMLID_sh179_">
                                        <path id="XMLID_sh181_" class="u-fill-primary-lighter" opacity=".075" d="M65.8,5.1L65.8,5.1c-0.4-1.2-1.6-2.1-2.9-2.1c-0.6,0-1.1,0.2-1.6,0.5c-0.3-1.9-2-3.4-4-3.4
                      c-1.8,0-3.3,1.2-3.8,2.8c-0.2-0.1-0.5-0.1-0.7-0.1c-1.4,0-2.5,1-2.7,2.3h-0.5c-1.1,0-2.1,0.9-2.1,2.1v0.2c0,1.1,0.9,2.1,2.1,2.1
                      h16.2c1.1,0,2.1-0.9,2.1-2.1V7.1C67.9,6,67,5.1,65.8,5.1z"/>
                                        <path id="XMLID_sh180_" class="u-fill-primary-lighter" opacity=".075" d="M52.5,9.3h-2.9c-1.1,0-2.1-0.9-2.1-2.1V7.1c0-1.1,0.9-2.1,2.1-2.1h0.5
                      c0.2-1.3,1.3-2.3,2.7-2.3c0.2,0,0.5,0,0.7,0.1C54,1.2,55.5,0,57.4,0c2,0,3.7,1.5,4,3.4c0.5-0.3,1-0.5,1.6-0.5
                      c1.3,0,2.5,0.9,2.8,2.1h0.1c1.1,0,2.1,0.9,2.1,2.1v0.2c0,1.1-0.9,2.1-2.1,2.1h-3.1H52.5z"/>
                                    </g>
                                    <g id="XMLID_sh176_">
                                        <path id="XMLID_sh178_" class="u-fill-primary-lighter" opacity=".075" d="M147.8,33.5L147.8,33.5c-0.3-0.8-1-1.3-1.8-1.3c-0.4,0-0.7,0.1-1,0.3
                      c-0.2-1.2-1.2-2.2-2.5-2.2c-1.1,0-2.1,0.8-2.4,1.8c-0.1,0-0.3-0.1-0.5-0.1c-0.9,0-1.6,0.6-1.7,1.5h-0.3c-0.7,0-1.3,0.6-1.3,1.3v0.1
                      c0,0.7,0.6,1.3,1.3,1.3h10.3c0.7,0,1.3-0.6,1.3-1.3v-0.1C149.1,34.1,148.5,33.5,147.8,33.5z"/>
                                        <path id="XMLID_sh177_" class="u-fill-primary-lighter" opacity=".075" d="M139.3,36.3h-1.8c-0.7,0-1.3-0.6-1.3-1.3v-0.1c0-0.7,0.6-1.3,1.3-1.3h0.3
                      c0.1-0.8,0.9-1.5,1.7-1.5c0.2,0,0.3,0,0.5,0.1c0.3-1,1.3-1.8,2.4-1.8c1.3,0,2.3,0.9,2.5,2.2c0.3-0.2,0.6-0.3,1-0.3
                      c0.9,0,1.6,0.6,1.8,1.3h0.1c0.7,0,1.3,0.6,1.3,1.3v0.1c0,0.7-0.6,1.3-1.3,1.3h-2H139.3z"/>
                                    </g>
                                    <g id="XMLID_sh125_">
                                        <rect id="XMLID_sh279_" x="65.5" y="50.9" class="u-fill-white" width="53.9"
                                              height="64.9"/>
                                        <polyline id="XMLID_sh124_" class="u-fill-none u-stroke-primary" stroke-width="1.25"
                                                  stroke-miterlimit="10"
                                                  points="65.5,115.6 65.5,50.9 119.4,50.9 119.4,115.8   "/>
                                        <rect id="XMLID_sh275_" x="86.1" y="96.6" class="u-fill-primary-lighter"
                                              opacity=".4" width="12.8" height="18.9"/>
                                        <rect id="XMLID_sh9_" x="86.1" y="96.6" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="12.8" height="18.9"/>
                                        <line class="u-fill-none u-stroke-primary" stroke-width="1.5" stroke-miterlimit="10"
                                              x1="65.8" y1="115.4" x2="119.8" y2="115.4"/>
                                        <line id="XMLID_sh8_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              x1="92.5" y1="97.9" x2="92.5" y2="114.1"/>
                                        <rect id="XMLID_sh271_" x="71.3" y="60" class="u-fill-primary-lighter" opacity=".4"
                                              width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh270_" x="83.1" y="60" class="u-fill-primary-lighter" opacity=".4"
                                              width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh7_" x="94.9" y="60" class="u-fill-primary-lighter" opacity=".4"
                                              width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh6_" x="106.8" y="60" class="u-fill-primary-lighter" opacity=".4"
                                              width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh257_" x="71.3" y="70.9" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh255_" x="83.1" y="70.9" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh254_" x="94.9" y="70.9" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh5_" x="106.8" y="70.9" class="u-fill-primary-lighter" opacity=".4"
                                              width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh252_" x="71.3" y="81.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh249_" x="83.1" y="81.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh247_" x="94.9" y="81.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh246_" x="106.8" y="81.7" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh245_" x="71.3" y="60" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh4_" x="83.1" y="60" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh242_" x="94.9" y="60" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh241_" x="106.8" y="60" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh230_" x="71.3" y="70.9" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh227_" x="83.1" y="70.9" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh219_" x="94.9" y="70.9" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh3_" x="106.8" y="70.9" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh204_" x="71.3" y="81.7" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh203_" x="71.3" y="96.5" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="13.9"/>
                                        <rect id="XMLID_sh200_" x="106.8" y="96.5" class="u-fill-primary-lighter"
                                              opacity=".4" width="6.3" height="13.9"/>
                                        <rect id="XMLID_sh197_" x="71.3" y="96.5" class="u-fill-none u-stroke-primary"
                                              stroke-width="1" stroke-miterlimit="10" width="6.3" height="13.9"/>
                                        <rect id="XMLID_sh191_" x="106.8" y="96.5" class="u-fill-none u-stroke-primary"
                                              stroke-width="1" stroke-miterlimit="10" width="6.3" height="13.9"/>
                                        <rect id="XMLID_sh2_" x="83.1" y="81.7" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh1_" x="94.9" y="81.7" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh165_" x="106.8" y="81.7" class="u-fill-none u-stroke-primary"
                                              stroke-miterlimit="10" width="6.3" height="6.3"/>
                                        <rect id="XMLID_sh162_" x="63.3" y="45.3" class="u-fill-light-blue-100" width="58.3"
                                              height="7.7"/>
                                        <path id="XMLID_sh160_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M121.1,53H63.8c-0.3,0-0.5-0.2-0.5-0.5v-6.7c0-0.3,0.2-0.5,0.5-0.5h57.3
                      c0.3,0,0.5,0.2,0.5,0.5v6.7C121.6,52.8,121.4,53,121.1,53z"/>
                                        <path id="XMLID_sh158_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M75.5,41.9l-2.9-1.5l-2.9,1.5c-0.1,0-0.2,0-0.2-0.1l0.6-3.2l-2.3-2.3c-0.1-0.1,0-0.2,0.1-0.2
                      l3.2-0.5l1.5-2.9c0-0.1,0.2-0.1,0.2,0l1.4,2.9l3.2,0.5c0.1,0,0.1,0.1,0.1,0.2l-2.4,2.3l0.5,3.2C75.7,41.9,75.6,42,75.5,41.9z"/>
                                        <path id="XMLID_sh153_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M88.5,41.9l-2.9-1.5l-2.9,1.5c-0.1,0-0.2,0-0.2-0.1l0.6-3.2l-2.3-2.3c-0.1-0.1,0-0.2,0.1-0.2
                      l3.2-0.5l1.5-2.9c0-0.1,0.2-0.1,0.2,0l1.4,2.9l3.2,0.5c0.1,0,0.1,0.1,0.1,0.2l-2.4,2.3l0.5,3.2C88.7,41.9,88.6,42,88.5,41.9z"/>
                                        <path id="XMLID_sh152_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M101.6,41.9l-2.9-1.5l-2.9,1.5c-0.1,0-0.2,0-0.2-0.1l0.6-3.2l-2.3-2.3c-0.1-0.1,0-0.2,0.1-0.2
                      l3.2-0.5l1.5-2.9c0-0.1,0.2-0.1,0.2,0l1.4,2.9l3.2,0.5c0.1,0,0.1,0.1,0.1,0.2l-2.4,2.3l0.5,3.2C101.8,41.9,101.7,42,101.6,41.9z"/>
                                        <path id="XMLID_sh149_" class="u-fill-none u-stroke-primary" stroke-miterlimit="10"
                                              d="M114.6,41.9l-2.9-1.5l-2.9,1.5c-0.1,0-0.2,0-0.2-0.1l0.6-3.2l-2.3-2.3c-0.1-0.1,0-0.2,0.1-0.2
                      l3.2-0.5l1.5-2.9c0-0.1,0.2-0.1,0.2,0l1.4,2.9l3.2,0.5c0.1,0,0.1,0.1,0.1,0.2l-2.4,2.3l0.5,3.2C114.8,41.9,114.7,42,114.6,41.9z"/>
                                        <g id="XMLID_sh128_">
                                            <path class="u-fill-danger" d="M144.1,106.5h-20.3c-0.6,0-1-0.5-1-1V93.9c0-0.6,0.5-1,1-1h20.3c0.6,0,1,0.5,1,1v11.6
                        C145.1,106,144.7,106.5,144.1,106.5z"/>
                                            <g>
                                                <path class="u-fill-white"
                                                      d="M129.4,95h2.2v0.6h-1.5v0.9h1.1V97h-1.1v1.5h-0.7V95z"/>
                                                <path class="u-fill-white" d="M133.6,98.5c-1,0-1.8-0.7-1.8-1.8c0-1,0.8-1.8,1.8-1.8c1,0,1.8,0.7,1.8,1.8
                          C135.4,97.7,134.6,98.5,133.6,98.5z M133.6,97.9c0.6,0,1.1-0.5,1.1-1.2s-0.4-1.2-1.1-1.2c-0.6,0-1.1,0.4-1.1,1.2
                          S133,97.9,133.6,97.9z"/>
                                                <path class="u-fill-white" d="M137.3,95c0.8,0,1.3,0.5,1.3,1.1c0,0.4-0.2,0.9-0.8,1l0.8,1.4h-0.8l-0.8-1.4h-0.3v1.4H136V95H137.3z
                           M137.2,95.5h-0.6v1h0.6c0.4,0,0.6-0.2,0.6-0.5C137.8,95.7,137.6,95.5,137.2,95.5z"/>
                                                <path class="u-fill-white" d="M129.7,104.5c-0.7,0-1.3-0.4-1.3-1h0.8c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.4c0-0.8-1.8-0.3-1.8-1.6
                          c0-0.6,0.5-1,1.2-1c0.7,0,1.2,0.4,1.3,1h-0.8c0-0.2-0.2-0.4-0.5-0.4c-0.3,0-0.5,0.1-0.5,0.4c0,0.7,1.8,0.3,1.8,1.5
                          C130.9,104,130.5,104.5,129.7,104.5z"/>
                                                <path class="u-fill-white"
                                                      d="M133.7,103.8h-1.4l-0.2,0.7h-0.7l1.3-3.5h0.8l1.3,3.5h-0.7L133.7,103.8z M133,101.8l-0.5,1.5h1L133,101.8z"
                                                />
                                                <path class="u-fill-white" d="M135.8,101v2.9h1.2v0.6h-1.9V101H135.8z"/>
                                                <path class="u-fill-white"
                                                      d="M139.4,101.5h-1.3v0.9h1.2v0.6h-1.2v0.9h1.3v0.6h-2V101h2V101.5z"/>
                                            </g>
                                            <line id="XMLID_sh129_" class="u-stroke-danger" x1="133.9" y1="106.5" x2="133.9"
                                                  y2="115.2"/>
                                        </g>
                                    </g>
                </svg>
                            </figure>
                            <!-- End SVG Icon -->

                            <h3 class="h4 mb-3">Laravel框架开发系统课程</h3>
                            <p class="mb-4">
                                Laravel是广受PHP开发团队喜欢的开源框架，开发敏捷、功能丰富、社区完善。
                            </p>
                            <a class="btn u-btn-danger--air transition-3d-hover" href="#">
                                进入学习
                                <span class="fa fa-angle-right ml-2"></span>
                            </a>
                        </article>
                        <!-- End Icon Block -->
                    </div>

                    <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                        <!-- Icon Block -->
                        <article class="bg-white text-center border rounded p-7">
                            <!-- SVG Icon -->
                            <figure class="w-75 mx-auto mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                     y="0px"
                                     viewBox="0 0 149.5 116.1" style="enable-background:new 0 0 149.5 116.1;"
                                     xml:space="preserve">
                  <path class="u-fill-light-blue-50" d="M74.8,0.4C33.5,0.4,0,33.9,0,75.1c0,15,4.5,29,12.1,40.8h125.3c7.6-11.7,12.1-25.7,12.1-40.8
                    C149.5,33.9,116,0.4,74.8,0.4z"/>
                                    <g id="XMLID_by142_">
                                        <path id="XMLID_by198_" class="u-fill-primary-lighter" opacity=".075" d="M119.7,20.5h-0.1c-0.5-1.7-2.1-3-4-3c-0.8,0-1.6,0.2-2.2,0.7c-0.4-2.7-2.7-4.8-5.6-4.8
                      c-2.5,0-4.7,1.7-5.4,4c-0.3-0.1-0.7-0.1-1-0.1c-1.9,0-3.5,1.4-3.8,3.3H97c-1.6,0-2.9,1.3-2.9,2.9v0.2c0,1.6,1.3,2.9,2.9,2.9h22.7
                      c1.6,0,2.9-1.3,2.9-2.9v-0.2C122.6,21.8,121.3,20.5,119.7,20.5z"/>
                                        <path id="XMLID_by192_" class="u-fill-primary-lighter" opacity=".075" d="M101,26.4H97c-1.6,0-2.9-1.3-2.9-2.9v-0.2c0-1.6,1.3-2.9,2.9-2.9h0.6c0.3-1.8,1.9-3.3,3.8-3.3
                      c0.3,0,0.7,0.1,1,0.1c0.7-2.3,2.9-4,5.4-4c2.8,0,5.1,2.1,5.6,4.8c0.6-0.4,1.4-0.7,2.2-0.7c1.9,0,3.5,1.3,4,3h0.1
                      c1.6,0,2.9,1.3,2.9,2.9v0.2c0,1.6-1.3,2.9-2.9,2.9h-4.4H101z"/>
                                    </g>
                                    <g id="XMLID_by179_">
                                        <path id="XMLID_by181_" class="u-fill-primary-lighter" opacity=".075" d="M65.8,5.1L65.8,5.1c-0.4-1.2-1.6-2.1-2.9-2.1c-0.6,0-1.1,0.2-1.6,0.5c-0.3-1.9-2-3.4-4-3.4
                      c-1.8,0-3.3,1.2-3.8,2.8c-0.2-0.1-0.5-0.1-0.7-0.1c-1.4,0-2.5,1-2.7,2.3h-0.5c-1.1,0-2.1,0.9-2.1,2.1v0.2c0,1.1,0.9,2.1,2.1,2.1
                      h16.2c1.1,0,2.1-0.9,2.1-2.1V7.1C67.9,6,67,5.1,65.8,5.1z"/>
                                        <path id="XMLID_by180_" class="u-fill-primary-lighter" opacity=".075" d="M52.5,9.3h-2.9c-1.1,0-2.1-0.9-2.1-2.1V7.1c0-1.1,0.9-2.1,2.1-2.1h0.5
                      c0.2-1.3,1.3-2.3,2.7-2.3c0.2,0,0.5,0,0.7,0.1C54,1.2,55.5,0,57.4,0c2,0,3.7,1.5,4,3.4c0.5-0.3,1-0.5,1.6-0.5
                      c1.3,0,2.5,0.9,2.8,2.1h0.1c1.1,0,2.1,0.9,2.1,2.1v0.2c0,1.1-0.9,2.1-2.1,2.1h-3.1H52.5z"/>
                                    </g>
                                    <g id="XMLID_by176_">
                                        <path id="XMLID_by178_" class="u-fill-primary-lighter" opacity=".075" d="M147.8,33.5L147.8,33.5c-0.3-0.8-1-1.3-1.8-1.3c-0.4,0-0.7,0.1-1,0.3
                      c-0.2-1.2-1.2-2.2-2.5-2.2c-1.1,0-2.1,0.8-2.4,1.8c-0.1,0-0.3-0.1-0.5-0.1c-0.9,0-1.6,0.6-1.7,1.5h-0.3c-0.7,0-1.3,0.6-1.3,1.3v0.1
                      c0,0.7,0.6,1.3,1.3,1.3h10.3c0.7,0,1.3-0.6,1.3-1.3v-0.1C149.1,34.1,148.5,33.5,147.8,33.5z"/>
                                        <path id="XMLID_by177_" class="u-fill-primary-lighter" opacity=".075" d="M139.3,36.3h-1.8c-0.7,0-1.3-0.6-1.3-1.3v-0.1c0-0.7,0.6-1.3,1.3-1.3h0.3
                      c0.1-0.8,0.9-1.5,1.7-1.5c0.2,0,0.3,0,0.5,0.1c0.3-1,1.3-1.8,2.4-1.8c1.3,0,2.3,0.9,2.5,2.2c0.3-0.2,0.6-0.3,1-0.3
                      c0.9,0,1.6,0.6,1.8,1.3h0.1c0.7,0,1.3,0.6,1.3,1.3v0.1c0,0.7-0.6,1.3-1.3,1.3h-2H139.3z"/>
                                    </g>
                                    <g id="XMLID_by399_">
                                        <rect id="XMLID_by654_" x="87.7" y="39.5" class="u-fill-white" width="27"
                                              height="75.4"/>
                                        <rect id="XMLID_by653_" x="87.7" y="39.5" class="u-fill-white" width="27"
                                              height="14.7"/>
                                        <polyline id="XMLID_by59_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10"
                                                  points="90,39.5 114.7,39.5 114.7,114.8 87.7,114.8  "/>
                                        <g id="XMLID_by650_">
                                            <line id="XMLID_by651_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="90" y1="54.2" x2="114.7" y2="54.2"/>
                                        </g>
                                        <line id="XMLID_by645_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="58.8" x2="112.1" y2="58.8"/>
                                        <line id="XMLID_by86_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="63" x2="112.1" y2="63"/>
                                        <line id="XMLID_by107_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="67.3" x2="112.1" y2="67.3"/>
                                        <line id="XMLID_by108_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="71.5" x2="112.1" y2="71.5"/>
                                        <line id="XMLID_by110_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="75.8" x2="112.1" y2="75.8"/>
                                        <line id="XMLID_by111_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="80" x2="112.1" y2="80"/>
                                        <line id="XMLID_by113_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="84.3" x2="112.1" y2="84.3"/>
                                        <line id="XMLID_by114_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="88.5" x2="112.1" y2="88.5"/>
                                        <line id="XMLID_by115_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="92.8" x2="112.1" y2="92.8"/>
                                        <line id="XMLID_by117_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="97" x2="112.1" y2="97"/>
                                        <line id="XMLID_by118_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="101.3" x2="112.1" y2="101.3"/>
                                        <line id="XMLID_by119_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="105.5" x2="112.1" y2="105.5"/>
                                        <line id="XMLID_by121_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="90" y1="109.8" x2="112.1" y2="109.8"/>
                                        <g id="XMLID_by405_">
                                            <line id="XMLID_by422_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="91.3" y1="41.5" x2="91.3" y2="51.8"/>
                                            <line id="XMLID_by421_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="94.3" y1="41.5" x2="94.3" y2="51.8"/>
                                            <line id="XMLID_by420_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="97.2" y1="41.5" x2="97.2" y2="51.8"/>
                                            <line id="XMLID_by419_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="100.2" y1="41.5" x2="100.2" y2="51.8"/>
                                            <line id="XMLID_by410_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="103.2" y1="41.5" x2="103.2" y2="51.8"/>
                                            <line id="XMLID_by408_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="106.1" y1="41.5" x2="106.1" y2="51.8"/>
                                            <line id="XMLID_by407_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="109.1" y1="41.5" x2="109.1" y2="51.8"/>
                                            <line id="XMLID_by406_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="112" y1="41.5" x2="112" y2="51.8"/>
                                        </g>
                                    </g>
                                    <g id="XMLID_by891_">
                                        <rect id="XMLID_by972_" x="68.6" y="22" class="u-fill-white" width="16.5"
                                              height="7.6"/>
                                        <rect id="XMLID_by970_" x="68.6" y="22" class="u-fill-none u-stroke-primary"
                                              stroke-width="1" stroke-miterlimit="10" width="16.5" height="7.6"/>
                                        <rect id="XMLID_by969_" x="65.2" y="27.2" class="u-fill-white" width="23.3"
                                              height="87.4"/>
                                        <rect id="XMLID_by968_" x="70" y="27.2" class="u-fill-primary-lighter"
                                              opacity=".075" width="12.8" height="87.4"/>
                                        <line id="XMLID_by967_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="68.6" y1="8.2" x2="68.6" y2="22.7"/>
                                        <line id="XMLID_by966_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="85.1" y1="8.2" x2="85.1" y2="22.7"/>
                                        <line id="XMLID_by965_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="76.8" y1="12.5" x2="76.8" y2="22"/>
                                        <polyline id="XMLID_by652_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" points="65.2,42 65.2,27.2 88.5,27.2 88.5,114.6  "/>
                                        <line id="XMLID_by893_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="70" y1="27.2" x2="70" y2="43.8"/>
                                        <line id="XMLID_by892_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="83.2" y1="27.2" x2="83.2" y2="114.3"/>
                                    </g>
                                    <g id="XMLID_by655_">
                                        <polygon id="XMLID_by890_" class="u-fill-white"
                                                 points="36.1,114.8 59,114.8 59,34.6 40,34.6 40,67.6 36.1,67.6  "/>
                                        <polyline id="XMLID_by428_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10"
                                                  points="59,34.6 40,34.6 40,67.4 36.1,67.4 36.1,114.8  "/>
                                        <polygon id="XMLID_by888_" class="u-fill-primary-lighter"
                                                 points="62.3,114.8 58.9,114.8 58.9,29.8 62.3,27.5  "/>
                                        <polyline id="XMLID_by427_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10"
                                                  points="58.9,42.8 58.9,29.8 62.3,27.5 62.3,42.5   "/>
                                        <line id="XMLID_by886_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="62.3" y1="10.4" x2="62.3" y2="28.6"/>
                                        <line id="XMLID_by841_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="37.2" x2="58.7" y2="37.2"/>
                                        <line id="XMLID_by840_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="40.3" x2="58.7" y2="40.3"/>
                                        <line id="XMLID_by839_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="43.4" x2="58.7" y2="43.4"/>
                                        <line id="XMLID_by838_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="46.5" x2="58.7" y2="46.5"/>
                                        <line id="XMLID_by837_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="49.7" x2="58.7" y2="49.7"/>
                                        <line id="XMLID_by836_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="52.8" x2="51.2" y2="52.8"/>
                                        <line id="XMLID_by835_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="55.9" x2="51.2" y2="55.9"/>
                                        <line id="XMLID_by834_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="59" x2="49.2" y2="59"/>
                                        <line id="XMLID_by833_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="62.1" x2="48.2" y2="62.1"/>
                                        <line id="XMLID_by828_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="65.2" x2="58.7" y2="65.2"/>
                                        <line id="XMLID_by827_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="39.9" y1="67.4" x2="58.7" y2="67.4"/>
                                        <g id="XMLID_by815_">
                                            <line id="XMLID_by826_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="69.1" x2="37.7" y2="70.6"/>
                                            <line id="XMLID_by825_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="69.1" x2="39.9" y2="70.6"/>
                                            <line id="XMLID_by824_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="69.1" x2="42.1" y2="70.6"/>
                                            <line id="XMLID_by823_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="69.1" x2="44.3" y2="70.6"/>
                                            <line id="XMLID_by822_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="69.1" x2="46.6" y2="70.6"/>
                                            <line id="XMLID_by821_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="69.1" x2="48.8" y2="70.6"/>
                                            <line id="XMLID_by820_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="69.1" x2="51" y2="70.6"/>
                                            <line id="XMLID_by819_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="69.1" x2="53.2" y2="70.6"/>
                                            <line id="XMLID_by818_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="69.1" x2="55.4" y2="70.6"/>
                                            <line id="XMLID_by816_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="69.1" x2="57.6" y2="70.6"/>
                                        </g>
                                        <g id="XMLID_by804_">
                                            <line id="XMLID_by814_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="72.2" x2="37.7" y2="73.7"/>
                                            <line id="XMLID_by813_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="72.2" x2="39.9" y2="73.7"/>
                                            <line id="XMLID_by812_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="72.2" x2="42.1" y2="73.7"/>
                                            <line id="XMLID_by811_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="72.2" x2="44.3" y2="73.7"/>
                                            <line id="XMLID_by810_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="72.2" x2="46.6" y2="73.7"/>
                                            <line id="XMLID_by809_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="72.2" x2="48.8" y2="73.7"/>
                                            <line id="XMLID_by808_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="72.2" x2="51" y2="73.7"/>
                                            <line id="XMLID_by807_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="72.2" x2="53.2" y2="73.7"/>
                                            <line id="XMLID_by806_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="72.2" x2="55.4" y2="73.7"/>
                                            <line id="XMLID_by805_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="72.2" x2="57.6" y2="73.7"/>
                                        </g>
                                        <g id="XMLID_by791_">
                                            <line id="XMLID_by802_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="75.3" x2="37.7" y2="76.8"/>
                                            <line id="XMLID_by801_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="75.3" x2="39.9" y2="76.8"/>
                                            <line id="XMLID_by800_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="75.3" x2="42.1" y2="76.8"/>
                                            <line id="XMLID_by799_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="75.3" x2="44.3" y2="76.8"/>
                                            <line id="XMLID_by798_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="75.3" x2="46.6" y2="76.8"/>
                                            <line id="XMLID_by797_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="75.3" x2="48.8" y2="76.8"/>
                                            <line id="XMLID_by796_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="75.3" x2="51" y2="76.8"/>
                                            <line id="XMLID_by795_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="75.3" x2="53.2" y2="76.8"/>
                                            <line id="XMLID_by794_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="75.3" x2="55.4" y2="76.8"/>
                                            <line id="XMLID_by793_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="75.3" x2="57.6" y2="76.8"/>
                                        </g>
                                        <g id="XMLID_by780_">
                                            <line id="XMLID_by790_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="78.4" x2="37.7" y2="79.9"/>
                                            <line id="XMLID_by789_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="78.4" x2="39.9" y2="79.9"/>
                                            <line id="XMLID_by788_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="78.4" x2="42.1" y2="79.9"/>
                                            <line id="XMLID_by787_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="78.4" x2="44.3" y2="79.9"/>
                                            <line id="XMLID_by786_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="78.4" x2="46.6" y2="79.9"/>
                                            <line id="XMLID_by785_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="78.4" x2="48.8" y2="79.9"/>
                                            <line id="XMLID_by784_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="78.4" x2="51" y2="79.9"/>
                                            <line id="XMLID_by783_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="78.4" x2="53.2" y2="79.9"/>
                                            <line id="XMLID_by782_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="78.4" x2="55.4" y2="79.9"/>
                                            <line id="XMLID_by781_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="78.4" x2="57.6" y2="79.9"/>
                                        </g>
                                        <g id="XMLID_by768_">
                                            <line id="XMLID_by779_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="81.5" x2="37.7" y2="83"/>
                                            <line id="XMLID_by777_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="81.5" x2="39.9" y2="83"/>
                                            <line id="XMLID_by776_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="81.5" x2="42.1" y2="83"/>
                                            <line id="XMLID_by775_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="81.5" x2="44.3" y2="83"/>
                                            <line id="XMLID_by774_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="81.5" x2="46.6" y2="83"/>
                                            <line id="XMLID_by773_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="81.5" x2="48.8" y2="83"/>
                                            <line id="XMLID_by772_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="81.5" x2="51" y2="83"/>
                                            <line id="XMLID_by771_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="81.5" x2="53.2" y2="83"/>
                                            <line id="XMLID_by770_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="81.5" x2="55.4" y2="83"/>
                                            <line id="XMLID_by769_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="81.5" x2="57.6" y2="83"/>
                                        </g>
                                        <g id="XMLID_by757_">
                                            <line id="XMLID_by767_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="84.6" x2="37.7" y2="86.1"/>
                                            <line id="XMLID_by766_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="84.6" x2="39.9" y2="86.1"/>
                                            <line id="XMLID_by765_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="84.6" x2="42.1" y2="86.1"/>
                                            <line id="XMLID_by764_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="84.6" x2="44.3" y2="86.1"/>
                                            <line id="XMLID_by763_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="84.6" x2="46.6" y2="86.1"/>
                                            <line id="XMLID_by762_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="84.6" x2="48.8" y2="86.1"/>
                                            <line id="XMLID_by761_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="84.6" x2="51" y2="86.1"/>
                                            <line id="XMLID_by760_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="84.6" x2="53.2" y2="86.1"/>
                                            <line id="XMLID_by759_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="84.6" x2="55.4" y2="86.1"/>
                                            <line id="XMLID_by758_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="84.6" x2="57.6" y2="86.1"/>
                                        </g>
                                        <g id="XMLID_by746_">
                                            <line id="XMLID_by756_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="87.7" x2="37.7" y2="89.2"/>
                                            <line id="XMLID_by755_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="87.7" x2="39.9" y2="89.2"/>
                                            <line id="XMLID_by754_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="87.7" x2="42.1" y2="89.2"/>
                                            <line id="XMLID_by753_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="87.7" x2="44.3" y2="89.2"/>
                                            <line id="XMLID_by752_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="87.7" x2="46.6" y2="89.2"/>
                                            <line id="XMLID_by751_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="87.7" x2="48.8" y2="89.2"/>
                                            <line id="XMLID_by750_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="87.7" x2="51" y2="89.2"/>
                                            <line id="XMLID_by749_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="87.7" x2="53.2" y2="89.2"/>
                                            <line id="XMLID_by748_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="87.7" x2="55.4" y2="89.2"/>
                                            <line id="XMLID_by747_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="87.7" x2="57.6" y2="89.2"/>
                                        </g>
                                        <g id="XMLID_by735_">
                                            <line id="XMLID_by745_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="90.8" x2="37.7" y2="92.3"/>
                                            <line id="XMLID_by744_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="90.8" x2="39.9" y2="92.3"/>
                                            <line id="XMLID_by743_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="90.8" x2="42.1" y2="92.3"/>
                                            <line id="XMLID_by742_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="90.8" x2="44.3" y2="92.3"/>
                                            <line id="XMLID_by741_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="90.8" x2="46.6" y2="92.3"/>
                                            <line id="XMLID_by740_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="90.8" x2="48.8" y2="92.3"/>
                                            <line id="XMLID_by739_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="90.8" x2="51" y2="92.3"/>
                                            <line id="XMLID_by738_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="90.8" x2="53.2" y2="92.3"/>
                                            <line id="XMLID_by737_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="90.8" x2="55.4" y2="92.3"/>
                                            <line id="XMLID_by736_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="90.8" x2="57.6" y2="92.3"/>
                                        </g>
                                        <g id="XMLID_by724_">
                                            <line id="XMLID_by734_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="93.9" x2="37.7" y2="95.4"/>
                                            <line id="XMLID_by733_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="93.9" x2="39.9" y2="95.4"/>
                                            <line id="XMLID_by732_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="93.9" x2="42.1" y2="95.4"/>
                                            <line id="XMLID_by731_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="93.9" x2="44.3" y2="95.4"/>
                                            <line id="XMLID_by730_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="93.9" x2="46.6" y2="95.4"/>
                                            <line id="XMLID_by729_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="93.9" x2="48.8" y2="95.4"/>
                                            <line id="XMLID_by728_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="93.9" x2="51" y2="95.4"/>
                                            <line id="XMLID_by727_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="93.9" x2="53.2" y2="95.4"/>
                                            <line id="XMLID_by726_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="93.9" x2="55.4" y2="95.4"/>
                                            <line id="XMLID_by725_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="93.9" x2="57.6" y2="95.4"/>
                                        </g>
                                        <g id="XMLID_by713_">
                                            <line id="XMLID_by723_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="97" x2="37.7" y2="98.5"/>
                                            <line id="XMLID_by722_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="97" x2="39.9" y2="98.5"/>
                                            <line id="XMLID_by721_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="97" x2="42.1" y2="98.5"/>
                                            <line id="XMLID_by720_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="97" x2="44.3" y2="98.5"/>
                                            <line id="XMLID_by719_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="97" x2="46.6" y2="98.5"/>
                                            <line id="XMLID_by718_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="97" x2="48.8" y2="98.5"/>
                                            <line id="XMLID_by717_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="97" x2="51" y2="98.5"/>
                                            <line id="XMLID_by716_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="97" x2="53.2" y2="98.5"/>
                                            <line id="XMLID_by715_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="97" x2="55.4" y2="98.5"/>
                                            <line id="XMLID_by714_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="97" x2="57.6" y2="98.5"/>
                                        </g>
                                        <g id="XMLID_by700_">
                                            <line id="XMLID_by712_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="100.1" x2="37.7" y2="101.6"/>
                                            <line id="XMLID_by711_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="100.1" x2="39.9" y2="101.6"/>
                                            <line id="XMLID_by709_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="100.1" x2="42.1" y2="101.6"/>
                                            <line id="XMLID_by708_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="100.1" x2="44.3" y2="101.6"/>
                                            <line id="XMLID_by707_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="100.1" x2="46.6" y2="101.6"/>
                                            <line id="XMLID_by706_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="100.1" x2="48.8" y2="101.6"/>
                                            <line id="XMLID_by705_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="100.1" x2="51" y2="101.6"/>
                                            <line id="XMLID_by703_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="100.1" x2="53.2" y2="101.6"/>
                                            <line id="XMLID_by702_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="100.1" x2="55.4" y2="101.6"/>
                                            <line id="XMLID_by701_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="100.1" x2="57.6" y2="101.6"/>
                                        </g>
                                        <g id="XMLID_by689_">
                                            <line id="XMLID_by699_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="103.2" x2="37.7" y2="104.7"/>
                                            <line id="XMLID_by698_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="103.2" x2="39.9" y2="104.7"/>
                                            <line id="XMLID_by697_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="103.2" x2="42.1" y2="104.7"/>
                                            <line id="XMLID_by696_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="103.2" x2="44.3" y2="104.7"/>
                                            <line id="XMLID_by695_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="103.2" x2="46.6" y2="104.7"/>
                                            <line id="XMLID_by694_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="103.2" x2="48.8" y2="104.7"/>
                                            <line id="XMLID_by693_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="103.2" x2="51" y2="104.7"/>
                                            <line id="XMLID_by692_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="103.2" x2="53.2" y2="104.7"/>
                                            <line id="XMLID_by691_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="103.2" x2="55.4" y2="104.7"/>
                                            <line id="XMLID_by690_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="103.2" x2="57.6" y2="104.7"/>
                                        </g>
                                        <g id="XMLID_by678_">
                                            <line id="XMLID_by688_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="106.3" x2="37.7" y2="107.8"/>
                                            <line id="XMLID_by687_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="106.3" x2="39.9" y2="107.8"/>
                                            <line id="XMLID_by686_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="106.3" x2="42.1" y2="107.8"/>
                                            <line id="XMLID_by685_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="106.3" x2="44.3" y2="107.8"/>
                                            <line id="XMLID_by684_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="106.3" x2="46.6" y2="107.8"/>
                                            <line id="XMLID_by683_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="106.3" x2="48.8" y2="107.8"/>
                                            <line id="XMLID_by682_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="106.3" x2="51" y2="107.8"/>
                                            <line id="XMLID_by681_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="106.3" x2="53.2" y2="107.8"/>
                                            <line id="XMLID_by680_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="106.3" x2="55.4" y2="107.8"/>
                                            <line id="XMLID_by679_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="106.3" x2="57.6" y2="107.8"/>
                                        </g>
                                        <g id="XMLID_by667_">
                                            <line id="XMLID_by677_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="109.4" x2="37.7" y2="110.9"/>
                                            <line id="XMLID_by676_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="109.4" x2="39.9" y2="110.9"/>
                                            <line id="XMLID_by675_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="109.4" x2="42.1" y2="110.9"/>
                                            <line id="XMLID_by674_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="109.4" x2="44.3" y2="110.9"/>
                                            <line id="XMLID_by673_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="109.4" x2="46.6" y2="110.9"/>
                                            <line id="XMLID_by672_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="109.4" x2="48.8" y2="110.9"/>
                                            <line id="XMLID_by671_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="109.4" x2="51" y2="110.9"/>
                                            <line id="XMLID_by670_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="109.4" x2="53.2" y2="110.9"/>
                                            <line id="XMLID_by669_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="109.4" x2="55.4" y2="110.9"/>
                                            <line id="XMLID_by668_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="109.4" x2="57.6" y2="110.9"/>
                                        </g>
                                        <g id="XMLID_by656_">
                                            <line id="XMLID_by666_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="37.7" y1="112.5" x2="37.7" y2="114"/>
                                            <line id="XMLID_by665_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="39.9" y1="112.5" x2="39.9" y2="114"/>
                                            <line id="XMLID_by664_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="42.1" y1="112.5" x2="42.1" y2="114"/>
                                            <line id="XMLID_by663_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="44.3" y1="112.5" x2="44.3" y2="114"/>
                                            <line id="XMLID_by662_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="46.6" y1="112.5" x2="46.6" y2="114"/>
                                            <line id="XMLID_by661_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="48.8" y1="112.5" x2="48.8" y2="114"/>
                                            <line id="XMLID_by660_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="51" y1="112.5" x2="51" y2="114"/>
                                            <line id="XMLID_by659_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="53.2" y1="112.5" x2="53.2" y2="114"/>
                                            <line id="XMLID_by658_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="55.4" y1="112.5" x2="55.4" y2="114"/>
                                            <line id="XMLID_by657_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10" x1="57.6" y1="112.5" x2="57.6" y2="114"/>
                                        </g>
                                    </g>
                                    <g id="XMLID_by435_">
                                        <circle id="XMLID_by842_" class="u-fill-white" opacity=".3" cx="62.6" cy="78.5"
                                                r="19"/>
                                        <line id="XMLID_by512_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="62.5" y1="99.1" x2="62.5" y2="108.1"/>
                                        <path id="XMLID_by509_" class="u-fill-primary-lighter" d="M62.5,56.8c-12,0-21.7,9.7-21.7,21.7c0,12,9.7,21.7,21.7,21.7c12,0,21.7-9.7,21.7-21.7
                      C84.2,66.5,74.5,56.8,62.5,56.8z M62.5,95C53.4,95,46,87.6,46,78.5C46,69.4,53.4,62,62.5,62c9.1,0,16.5,7.4,16.5,16.5
                      C78.9,87.6,71.6,95,62.5,95z"/>
                                        <path id="XMLID_by57_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" d="M46,64.4c-3.2,3.8-5.2,8.7-5.2,14.1c0,12,9.7,21.7,21.7,21.7c12,0,21.7-9.7,21.7-21.7
                      c0-5.4-2-10.3-5.2-14.1"/>
                                        <rect id="XMLID_by506_" x="58.2" y="105.4" class="u-fill-primary-lighter"
                                              width="8.6" height="9.4"/>
                                        <polyline id="XMLID_by56_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                                  stroke-miterlimit="10"
                                                  points="66.8,114.7 66.8,105.4 58.2,105.4 58.2,114.7  "/>
                                        <line id="XMLID_by54_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" x1="58" y1="111.6" x2="67" y2="111.6"/>
                                        <path id="XMLID_by412_" class="u-fill-primary-lighter" d="M62.6,43.8c-8.3,0-15,6.7-15,15c0,8.3,15,25.3,15,25.3s15-17,15-25.3
                      C77.6,50.5,70.9,43.8,62.6,43.8z M62.6,66.1c-4.8,0-8.7-3.9-8.7-8.7c0-4.8,3.9-8.7,8.7-8.7c4.8,0,8.7,3.9,8.7,8.7
                      C71.3,62.2,67.4,66.1,62.6,66.1z"/>
                                        <path id="XMLID_by45_" class="u-fill-none u-stroke-primary" stroke-width="1"
                                              stroke-miterlimit="10" d="M49.8,50.9c-1.4,2.3-2.3,5-2.3,7.9c0,8.3,15,25.3,15,25.3s15-17,15-25.3c0-8.3-6.7-15-15-15
                      c-1.9,0-3.7,0.4-5.4,1 M53.1,47.1c-0.4,0.3-0.8,0.7-1.2,1.1 M62.6,66.1c-4.8,0-8.7-3.9-8.7-8.7c0-4.8,3.9-8.7,8.7-8.7
                      c4.8,0,8.7,3.9,8.7,8.7C71.3,62.2,67.4,66.1,62.6,66.1z"/>
                                    </g>
                </svg>
                            </figure>
                            <!-- End SVG Icon -->

                            <h3 class="h4 mb-3">PHP编程零基础入门</h3>
                            <p class="mb-4">
                                从软件安装到编程语法，同时结合实战案例，让你轻松掌握PHP这门广泛使用的编程语言。
                            </p>
                            <a class="btn u-btn-primary--air transition-3d-hover" href="#">
                                马上学习
                                <span class="fa fa-angle-right ml-2"></span>
                            </a>
                        </article>
                        <!-- End Icon Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Icon Blocks Section -->

        <!-- How It Works Section -->
        <div class="container u-space-3">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
        <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mb-4">
          <span class="fab fa-accusoft u-icon__inner"></span>
        </span>
                <h2 class="font-weight-medium">
                    每一个课程我们都精心打造，让你快速掌握编程技能
                </h2>
            </div>
            <!-- End Title -->

            <div class="row align-items-lg-center">
                <div class="col-lg-6 order-lg-2 mb-7 mb-lg-0">
                    <ul class="list-unstyled">
                        <!-- Info Block -->
                        <li class="u-indicator-steps py-3">
                            <div class="media align-items-center border rounded p-5">
                                <div class="d-flex u-indicator-steps__inner mr-3">
                                    <span class="display-4 text-primary font-weight-medium">1.</span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0">
                                        后盾人录制发布了数千课高质量视频教程，视频在优酷、土豆、B站等视频网站拥有非常高的播放量，无数技术爱好者受益其中。
                                    </p>
                                </div>
                            </div>
                        </li>
                        <!-- End Info Block -->

                        <!-- Info Block -->
                        <li class="u-indicator-steps py-3">
                            <div class="media align-items-center border rounded p-5">
                                <div class="d-flex u-indicator-steps__inner mr-3">
                                    <span class="display-4 text-primary font-weight-medium">2.</span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0">
                                        以实际需求为切入点，除了讲解知识点的基础概念和基本应用外，还融入了讲师多年的一线开发经验。我们会用通俗易懂的方式，为你传授扎实的真功夫。
                                    </p>
                                </div>
                            </div>
                        </li>
                        <!-- End Info Block -->

                        <!-- Info Block -->
                        <li class="u-indicator-steps py-3">
                            <div class="media align-items-center border rounded p-5">
                                <div class="d-flex u-indicator-steps__inner mr-3">
                                    <span class="display-4 text-primary font-weight-medium">3.</span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0">
                                        后盾人团队是一群痴迷技术的工程师，无时无刻在探索和实践着新的技术，我们的课程实用性、高效性，紧追市场需求，是你择业、跳槽的好帮手。
                                    </p>
                                </div>
                            </div>
                        </li>
                        <!-- End Info Block -->
                    </ul>
                </div>

                <div class="col-lg-6 order-lg-1">
                    <div class="pr-lg-7">
                        <!-- SVG Icon -->
                        <img src="{{asset('org/front')}}/svg/flat-icons/house-agency-flat-concept-illustration.svg"
                             alt="SVG Illustration">
                        <!-- End SVG Icon -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End How It Works Section -->

        <!-- Divider -->
        <div class="container">
            <hr class="my-0">
        </div>
        <!-- End Divider -->

        <!-- Icon Blocks Section -->
        <div class="container u-space-3">
            <div class="row justify-content-md-between">
                <div class="col-sm-6 offset-sm-3 col-lg-4 offset-lg-0 mb-9 mb-lg-0">
                    <!-- Icon Block -->
                    <div class="text-center px-lg-5">
            <span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">
              <span class="fa fa-book u-icon__inner"></span>
            </span>
                        <h3 class="h5">完善的手册</h3>
                        <p>
                            我们针对常用框架与组件进行了手册的翻译，提升工程师的开发效率。
                        </p>
                        <a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="#">
                            查看手册
                            <span class="fa fa-angle-right ml-2"></span>
                        </a>
                    </div>
                    <!-- End Icon Block -->
                </div>

                <div class="col-sm-6 col-lg-4 mb-9 mb-lg-0">
                    <!-- Icon Block -->
                    <div class="text-center px-lg-5">
            <span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">
              <span class="fa fa-calculator u-icon__inner"></span>
            </span>
                        <h3 class="h5">社区讨论</h3>
                        <p>
                            提供在线讨论、QQ交流群、每日直播课等方式，无数小伙伴与你同学习进步！
                        </p>
                        <a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="#">
                            进入社区
                            <span class="fa fa-angle-right ml-2"></span>
                        </a>

                    </div>
                    <!-- End Icon Block -->
                </div>

                <div class="col-sm-6 col-lg-4">
                    <!-- Icon Block -->
                    <div class="text-center px-lg-5">
            <span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">
              <span class="far fa-calendar-alt u-icon__inner"></span>
            </span>
                        <h3 class="h5">全程实战</h3>
                        <p>课程面向企业级实际应用，课程以实战贯穿始终。深入浅出，细致入微。</p>
                        <a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="#">
                            查看课程
                            <span class="fa fa-angle-right ml-2"></span>
                        </a>
                    </div>
                    <!-- End Icon Block -->
                </div>
            </div>
        </div>
        <!-- End Icon Blocks Section -->

        <!-- Houses Section -->
        <div class="u-bg-light-blue-50">
            <div class="container u-space-3">
                <!-- Title -->
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
                  <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mb-4">
                    <span class="far fa-building u-icon__inner"></span>
                  </span>
                    <h2 class="font-weight-medium">海量视频大放送</h2>
                </div>
                <!-- End Title -->
                <!-- Slick Carousel -->
                <div class="js-slick-carousel u-slick u-slick-zoom u-slick--gutters-3 mb-7"
                     data-slides-show="3"
                     data-pagi-classes="text-center u-slick__pagination mt-7 mb-0"
                     data-responsive='[{
               "breakpoint": 992,
               "settings": {
                 "slidesToShow": 2
               }
             }, {
               "breakpoint": 768,
               "settings": {
                 "slidesToShow": 1
               }
             }]'>

                    <div class="js-slide">
                        <!-- House Items -->
                        <article class="bg-white shadow-sm mb-3">
                            <div class="position-relative">
                                <img class="img-fluid w-100 rounded-top" src="{{asset('org/front')}}/img/500x550/img15.jpg"
                                     alt="Image Description">
                                <header class="position-absolute-top-0 p-5">
                                    <a class="media align-items-center text-white" href="#">
                                        <div class="d-flex mr-2">
                                            <img class="img-fluid u-sm-avatar rounded-circle"
                                                 src="/images/100x100/img2.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span>Casy Williams</span>
                                        </div>
                                    </a>
                                </header>
                                <div class="position-absolute-bottom-0 p-5">
                                    <span class="h4 text-white">$750,000</span>
                                </div>
                            </div>

                            <div class="rounded-bottom p-5">
                                <h4 class="h6">
                                    <a href="#">Secluded Intown Treehouse</a>
                                </h4>
                                <span class="fa fa-map-marker-alt text-danger mr-2"></span>
                                <a class="text-secondary" href="#">New York, US</a>
                            </div>
                        </article>
                        <!-- End House Items -->
                    </div>

                    <div class="js-slide">
                        <!-- House Items -->
                        <article class="bg-white shadow-sm mb-3">
                            <div class="position-relative">
                                <img class="img-fluid w-100 rounded-top" src="{{asset('org/front')}}/img/500x550/img16.jpg"
                                     alt="Image Description">
                                <header class="position-absolute-top-0 p-5">
                                    <a class="media align-items-center text-white" href="#">
                                        <div class="d-flex mr-2">
                                            <img class="img-fluid u-sm-avatar rounded-circle"
                                                 src="{{asset('org/front')}}/img/100x100/img3.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span>Chris Johnson</span>
                                        </div>
                                    </a>
                                </header>
                                <div class="position-absolute-bottom-0 p-5">
                                    <span class="h4 text-white">$173,000</span>
                                </div>
                            </div>

                            <div class="rounded-bottom p-5">
                                <h4 class="h6">
                                    <a href="#">Malibu Dream Airstream</a>
                                </h4>
                                <span class="fa fa-map-marker-alt text-danger mr-2"></span>
                                <a class="text-secondary" href="#">Manhattan, US</a>
                            </div>
                        </article>
                        <!-- End House Items -->
                    </div>

                    <div class="js-slide">
                        <!-- House Items -->
                        <article class="bg-white shadow-sm mb-3">
                            <div class="position-relative">
                                <img class="img-fluid w-100 rounded-top" src="{{asset('org/front')}}/img/500x550/img17.jpg"
                                     alt="Image Description">
                                <header class="position-absolute-top-0 p-5">
                                    <a class="media align-items-center text-white" href="#">
                                        <div class="d-flex mr-2">
                                            <img class="img-fluid u-sm-avatar rounded-circle"
                                                 src="{{asset('org/front')}}/img/100x100/img4.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span>Elon Fisher</span>
                                        </div>
                                    </a>
                                </header>
                                <div class="position-absolute-bottom-0 p-5">
                                    <span class="h4 text-white">$199,000</span>
                                </div>
                            </div>

                            <div class="rounded-bottom p-5">
                                <h4 class="h6">
                                    <a href="#">Tintern Crescent</a>
                                </h4>
                                <span class="fa fa-map-marker-alt text-danger mr-2"></span>
                                <a class="text-secondary" href="#">Toronto, Canada</a>
                            </div>
                        </article>
                        <!-- End House Items -->
                    </div>

                    <div class="js-slide">
                        <!-- House Items -->
                        <article class="bg-white shadow-sm mb-3">
                            <div class="position-relative">
                                <img class="img-fluid w-100 rounded-top" src="{{asset('org/front')}}/img/500x550/img18.jpg"
                                     alt="Image Description">
                                <header class="position-absolute-top-0 p-5">
                                    <a class="media align-items-center text-white" href="#">
                                        <div class="d-flex mr-2">
                                            <img class="img-fluid u-sm-avatar rounded-circle"
                                                 src="{{asset('org/front')}}/img/100x100/img1.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <span>Maria Muszynska</span>
                                        </div>
                                    </a>
                                </header>
                                <div class="position-absolute-bottom-0 p-5">
                                    <span class="h4 text-white">$376,000</span>
                                </div>
                            </div>

                            <div class="rounded-bottom p-5">
                                <h4 class="h6">
                                    <a href="#">Tiverton Avenue</a>
                                </h4>
                                <span class="fa fa-map-marker-alt text-danger mr-2"></span>
                                <a class="text-secondary" href="#">Beijing, China</a>
                            </div>
                        </article>
                        <!-- End House Items -->
                    </div>
                </div>
                <!-- End Slick Carousel -->

                <div class="text-center">
                    <a class="btn u-btn-primary--air u-btn-wide transition-3d-hover" href="#">查看全部</a>
                </div>
            </div>
        </div>
        <!-- End Houses Section -->

        <!-- Features Section -->
        <div class="position-relative u-space-3 u-space-4--lg">
            <!-- SVG Mockups -->
            <figure class="col-lg-6 position-absolute-top-left-0--lg u-content-centered-y--lg mb-9 mb-lg-0">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 999.1 577.5" style="enable-background:new 0 0 999.1 577.5;" xml:space="preserve">
          <!-- Laptop Frame -->
                    <path class="u-fill-white u-stroke-light-blue-125" stroke-miterlimit="10" d="M881.3,577H117.5c-14.4,0-26.2-11.8-26.2-26.2V26.7c0-14.4,11.8-26.2,26.2-26.2h763.9
            c14.4,0,26.2,11.8,26.2,26.2v524.2C907.5,565.2,895.7,577,881.3,577z"/>
                    <circle fill="#f7f7f7" cx="498" cy="23.8" r="3"/>
                    <path class="u-fill-white" d="M996.3,561.2H2.9c-1.5,0-2.8-1.3-2.8-2.8l0,0c0-1.5,1.3-2.8,2.8-2.8h993.4c1.5,0,2.8,1.3,2.8,2.8l0,0
            C999.1,559.9,997.9,561.2,996.3,561.2z"/>
                    <path fill="#efefef"
                          d="M499.6,563L0,561.2c0,0,24.1,11.3,117.8,15.8H498h3.1h380.2c93.7-4.5,117.8-15.8,117.8-15.8L499.6,563z"/>
                    <linearGradient id="laptopFrameID1" gradientUnits="userSpaceOnUse" x1="403.8206" y1="559.1469"
                                    x2="594.97" y2="559.1469">
                        <stop offset="5.908129e-07" style="stop-color:#F0F1F2"/>
                        <stop offset="5.235744e-02" style="stop-color:#F6F7F8"/>
                        <stop offset="0.1708" style="stop-color:#FDFDFD"/>
                        <stop offset="0.5" style="stop-color:#FFFFFF"/>
                        <stop offset="0.8292" style="stop-color:#FDFDFD"/>
                        <stop offset="0.9476" style="stop-color:#F6F7F8"/>
                        <stop offset="1" style="stop-color:#F0F1F2"/>
                    </linearGradient>
                    <path fill="url(#laptopFrameID1)"
                          d="M591.4,562.7H407.4c-1.9,0-3.5-1.6-3.5-3.5v-3.5H595v3.5C595,561.1,593.4,562.7,591.4,562.7z"/>
                    <g>
                        <defs>
                            <rect id="laptopFrameID2" x="121.7" y="38" width="752.5" height="469.7"/>
                        </defs>
                        <clipPath id="laptopFrameID3">
                            <use xlink:href="#laptopFrameID2" style="overflow:visible;"/>
                        </clipPath>
                        <g style="clip-path:url(#laptopFrameID3);">
                            <!-- Apply your (1618px width to 1010px height) image here -->
                            <image style="overflow:visible;" width="1618" height="1010"
                                   xlink:href="/images/img2.jpg"
                                   transform="matrix(0.4651 0 0 0.4651 121.7472 37.9679)"></image>
                        </g>
                        <use xlink:href="#laptopFrameID2"
                             style="overflow:visible;fill:none;stroke:#E7EAF3;stroke-miterlimit:10;"/>
                    </g>
                    <!-- End Laptop Frame -->

                    <!-- Phone Frame -->
                    <path class="u-fill-white u-stroke-light-blue-125" stroke-miterlimit="10" d="M944,577H823.1c-29.7,0-54-24.3-54-54V150.9c0-29.7,24.3-54,54-54H944c29.7,0,54,24.3,54,54V523
            C998,552.7,973.7,577,944,577z"/>
                    <circle fill="#f7f7f7" cx="884.3" cy="543.4" r="18.4"/>
                    <path class="u-fill-gray-75" fill-rule="evenodd" clip-rule="evenodd" d="M899.1,133.7h-30.3c-1.6,0-2.9-1.3-2.9-2.9l0,0c0-1.6,1.3-2.9,2.9-2.9h30.3c1.6,0,2.9,1.3,2.9,2.9l0,0
            C902,132.4,900.7,133.7,899.1,133.7z"/>
                    <g>
                        <defs>
                            <rect id="phoneFrameID1" x="783.1" y="154.8" width="202.2" height="361"/>
                        </defs>
                        <clipPath id="phoneFrameID2">
                            <use xlink:href="#phoneFrameID1" style="overflow:visible;"/>
                        </clipPath>
                        <g style="clip-path:url(#phoneFrameID2);">
                            <!-- Apply your (282px width to 500px height) image here -->
                            <image style="overflow:visible;" width="282" height="500"
                                   xlink:href="/images/img8.jpg"
                                   transform="matrix(0.722 0 0 0.722 782.1237 155.3553)"></image>
                        </g>
                        <use xlink:href="#phoneFrameID1"
                             style="overflow:visible;fill:none;stroke:#E7EAF3;stroke-miterlimit:10;"/>
                    </g>
                    <!-- End Phone Frame -->
        </svg>
            </figure>
            <!-- End SVG Mockups -->

            <div class="container">
                <div class="row justify-content-lg-end">
                    <div class="col-lg-5">
                        <!-- Title -->
                        <div class="pl-lg-4">
                            <div class="mb-5">
                                <h2 class="font-weight-medium">全平台适配</h2>
                                <p>
                                    我们针对桌面电脑、移动手机进行了大量调优。让你可以在全平台轻松学习课程，不受时间地点限制影响学习计划。
                                </p>
                            </div>

                            <!-- Button -->

                            <!-- End Button -->

                            <!-- Button -->

                            <!-- End Button -->
                        </div>
                        <!-- End Title -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Features Section -->

        <!-- Testimonials -->
        <div class="u-bg-light-blue-50">
            <div class="container u-space-3">
                <!-- Title -->
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
          <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mb-4">
            <span class="far fa-thumbs-up u-icon__inner"></span>
          </span>
                    <h2 class="font-weight-medium">感谢助力</h2>
                </div>
                <!-- End Title -->

                <!-- Slick Carousel -->
                <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                     data-slides-show="3"
                     data-autoplay="true"
                     data-speed="5000"
                     data-infinite="true"
                     data-center-mode="true"
                     data-pagi-classes="d-lg-none text-center u-slick__pagination mt-7 mb-0"
                     data-responsive='[{
               "breakpoint": 992,
               "settings": {
                 "slidesToShow": 2
               }
             }, {
               "breakpoint": 768,
               "settings": {
                 "slidesToShow": 1
               }
             }]'>
                    <div class="js-slide mb-1">
                        <!-- Testimonial -->
                        <div class="d-flex align-items-start flex-column bg-white border rounded p-5">
                            <div class="mb-auto">
                                <p>
                                    向大叔讲课必须五星好评，我本来想了解下框架与语言，找个团队开发一款软件自己用的软件。但看了向大叔讲课后，自己深深爱上laravel了，自己先学着，后期用得上。强烈支持向大叔！专业，声音听着舒服！
                                </p>
                            </div>

                            <!-- Author & Review -->
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('org/front')}}/img/100x100/img1.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="h6 mb-1">Maria Muszynska</h4>
                                    <ul class="list-inline text-warning small">
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Author & Review -->
                        </div>
                        <!-- End Testimonial -->
                    </div>

                    <div class="js-slide mb-1">
                        <!-- Testimonial -->
                        <div class="d-flex align-items-start flex-column bg-white border rounded p-5">
                            <div class="mb-auto">
                                <p>
                                    老师技术挺牛的，可惜速度太快，自己对laravel新手，希望以后会进步吧。
                                    向军大叔主讲【laravel小白入门篇】通俗易懂！有课程视频可回放学习。免费授课，机会难得。
                                </p>
                            </div>

                            <!-- Author & Review -->
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('org/front')}}/img/100x100/img2.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="h6 mb-1">细****</h4>
                                    <ul class="list-inline text-warning small">
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Author & Review -->
                        </div>
                        <!-- End Testimonial -->
                    </div>

                    <div class="js-slide mb-1">
                        <!-- Testimonial -->
                        <div class="d-flex align-items-start flex-column bg-white border rounded p-5">
                            <div class="mb-auto">
                                <p>向军老师很实在，由浅入深，讲得非常棒，期待下次直播课，向老师讲的好，容易懂。</p>
                            </div>

                            <!-- Author & Review -->
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('org/front')}}/img/100x100/img3.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="h6 mb-1">Mark McManus</h4>
                                    <ul class="list-inline text-warning small">
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li class="list-inline-item mx-0">
                                            <span class="fa fa-star"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Author & Review -->
                        </div>
                        <!-- End Testimonial -->
                    </div>
                </div>
                <!-- End Slick Carousel -->
            </div>
        </div>
        <!-- End Testimonials -->

        <!-- CTA -->
        <div class="container text-center u-space-3">
            <!-- Title -->
            <div class="w-md-60 text-center mx-auto mb-6">
                <h2 class="font-weight-medium">已经有 <strong class="text-primary">35,000</strong> 开发工程师及编程爱好者与你在后盾人相遇</h2>
            </div>
            <!-- End Title -->

            <div class="mb-6">
                <a class="btn btn-primary u-btn-primary u-btn-wide transition-3d-hover" href="#">进入社区、结交志同道合的朋友</a>
            </div>

            <!-- 视频介绍 -->

            <!-- End Fancybox -->
        </div>
        <!-- End CTA -->

        <hr class="my-0">
    </main>
@endsection