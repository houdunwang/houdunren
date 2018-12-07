@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <main id="content" role="main" class="edu-home">
        <div class="d-lg-flex align-items-lg-center position-relative min-height-100vh--lg u-bg-img-hero u-space-3 u-space-5-top--md u-space-0--lg"
             style="background-image: url(/images/img32.jpg);min-height: 70vh">
            <div class="container mt-lg-5">
                <div class="w-lg-35 mb-5">
                    <h1 class="display-4 text-white">使用 <strong class="font-weight-bold">实战教程</strong> 带你学会编程</h1>
                    <a class="btn btn-sm btn-primary u-btn-primary transition-3d-hover mt-3"
                       href="{{route('edu.lesson.lists')}}">
                        开始学习
                    </a>
                    <a class="btn btn-sm btn-light u-btn-primary transition-3d-hover mt-3"
                       href="{{route('edu.dynamic.index')}}">
                        社区交流
                    </a>
                </div>
            </div>
        </div>
        @include('edu.layouts._system_lesson_ad')
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
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="pr-lg-7">
                        <img src="{{asset('org/front')}}/svg/flat-icons/house-agency-flat-concept-illustration.svg"
                             alt="SVG Illustration">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <hr class="my-0">
        </div>
        {{--<div class="container u-space-3">--}}
            {{--<div class="row justify-content-md-between">--}}
                {{--<div class="col-sm-6 offset-sm-3 col-lg-4 offset-lg-0 mb-9 mb-lg-0">--}}
                    {{--<div class="text-center px-lg-5">--}}
            {{--<span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">--}}
              {{--<span class="fa fa-book u-icon__inner"></span>--}}
            {{--</span>--}}
                        {{--<h3 class="h5">完善的手册</h3>--}}
                        {{--<p>--}}
                            {{--我们针对常用框架与组件进行了手册的翻译，提升工程师的开发效率。--}}
                        {{--</p>--}}
                        {{--<a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="#">--}}
                            {{--查看手册--}}
                            {{--<span class="fa fa-angle-right ml-2"></span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 col-lg-4 mb-9 mb-lg-0">--}}
                    {{--<div class="text-center px-lg-5">--}}
            {{--<span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">--}}
              {{--<span class="fa fa-calculator u-icon__inner"></span>--}}
            {{--</span>--}}
                        {{--<h3 class="h5">社区讨论</h3>--}}
                        {{--<p>--}}
                            {{--提供在线讨论、QQ交流群、每日直播课等方式，无数小伙伴与你同学习进步！--}}
                        {{--</p>--}}
                        {{--<a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="{{route('edu.dynamic.index')}}">--}}
                            {{--进入社区--}}
                            {{--<span class="fa fa-angle-right ml-2"></span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 col-lg-4">--}}
                    {{--<div class="text-center px-lg-5">--}}
            {{--<span class="u-icon u-icon-primary--air u-icon--lg rounded-circle mb-3">--}}
              {{--<span class="far fa-calendar-alt u-icon__inner"></span>--}}
            {{--</span>--}}
                        {{--<h3 class="h5">全程实战</h3>--}}
                        {{--<p>课程面向企业级实际应用，课程以实战贯穿始终。深入浅出，细致入微。</p>--}}
                        {{--<a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="{{route('edu.lesson.lists')}}">--}}
                            {{--查看课程--}}
                            {{--<span class="fa fa-angle-right ml-2"></span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="u-bg-light-blue-50">
            <div class="container u-space-3">
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
                  <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mb-4">
                    <span class="far fa-building u-icon__inner"></span>
                  </span>
                    <h2 class="font-weight-medium">海量视频大放送</h2>
                </div>
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

                    @foreach(\App\Models\EduLesson::where('is_commend',1)->limit(6)->get() as $lesson)
                        <div class="js-slide">
                            <article class="bg-white shadow-sm mb-3 lesson-list">
                                <div class="position-relative">
                                    <img class="img-fluid w-100 rounded-top" src="{{$lesson['thumb']}}"
                                         alt="Image Description">
                                </div>
                                <div class="rounded-bottom p-5">
                                    <h4 class="h6">
                                        <a href="{{route('edu.lesson.show',$lesson)}}">{{$lesson['title']}}</a>
                                    </h4>
                                    <div class="small text-secondary row">
                                        <div class="col-8">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            {{$lesson['updated_at']->diffForHumans()}}
                                            <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                            {{$lesson->video()->count()}} 节课
                                        </div>
                                        @can('update',$lesson)
                                            <div class="col-4 text-right">
                                                <div class="position-relative" style="top: -6px;">
                                                    <a id="activitySettingsDropdownInvoker" class="u-icon u-icon-secondary--air u-icon--sm u-bg-transparent" href="javascript:;" role="button" aria-controls="{{$lesson['id']}}" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#{{$lesson['id']}}" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                                        <span class="fab fa-windows u-icon__inner"></span>
                                                    </a>
                                                    <div id="{{$lesson['id']}}" class="u-unfold right-0 text-left mt-2 u-unfold--css-animation u-unfold--hidden" aria-labelledby="activitySettingsDropdownInvoker" style="min-width: 190px; animation-duration: 300ms; right: 0px;">
                                                        <a class="u-list__link" href="{{route('edu.lesson.edit',$lesson)}}">
                                                            <span class="fa fa-eye-slash min-width-3 text-center font-size-13 mr-2"></span>
                                                            编辑
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                </div>
                <div class="text-center">
                    <a class="btn u-btn-primary--air u-btn-wide transition-3d-hover" href="{{route('edu.lesson.lists')}}">查看全部</a>
                </div>
            </div>
        </div>
            <div class="position-relative space-2 space-md-3 space-lg-4">
                <!-- SVG Mockups -->
                <div id="SVGlaptopAndIphone" class="col-lg-6 position-lg-absolute top-lg-0 left-lg-0 content-centered-y--lg mb-9 mb-lg-0" style="">
                    <figure class="ie-laptop-and-iphone">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 999.1 577.5" style="enable-background:new 0 0 999.1 577.5;" xml:space="preserve" class="injected-svg js-svg-injector" data-img-paths="[
                 {&quot;targetId&quot;: &quot;#SVGlaptopAndIphoneImg1&quot;, &quot;newPath&quot;: &quot;../../assets/img/1618x1010/img2.jpg&quot;},
                 {&quot;targetId&quot;: &quot;#SVGlaptopAndIphoneImg2&quot;, &quot;newPath&quot;: &quot;../../assets/img/282x500/img8.jpg&quot;}
               ]" data-parent="#SVGlaptopAndIphone">
<style type="text/css">
    .laptop-and-iphone-0{fill:#FFFFFF;stroke:#E7EAF3;}
    .laptop-and-iphone-1{fill:#F7F7F7;}
    .laptop-and-iphone-2{fill:#FFFFFF;}
    .laptop-and-iphone-3{fill:#E7EAF3;}
    .laptop-and-iphone-4{fill:#F7F7F7;}
</style>
                            <path class="laptop-and-iphone-0 fill-white stroke-gray-300" stroke-miterlimit="10" d="M881.3,577H117.5c-14.4,0-26.2-11.8-26.2-26.2V26.7c0-14.4,11.8-26.2,26.2-26.2h763.9  c14.4,0,26.2,11.8,26.2,26.2v524.2C907.5,565.2,895.7,577,881.3,577z"></path>
                            <circle class="laptop-and-iphone-1 fill-gray-200" cx="498" cy="23.8" r="3"></circle>
                            <path class="laptop-and-iphone-2 fill-white" d="M996.3,561.2H2.9c-1.5,0-2.8-1.3-2.8-2.8l0,0c0-1.5,1.3-2.8,2.8-2.8h993.4c1.5,0,2.8,1.3,2.8,2.8l0,0  C999.1,559.9,997.9,561.2,996.3,561.2z"></path>
                            <path class="laptop-and-iphone-3 fill-gray-300" d="M499.6,563L0,561.2c0,0,24.1,11.3,117.8,15.8H498h3.1h380.2c93.7-4.5,117.8-15.8,117.8-15.8L499.6,563z"></path>
                            <linearGradient id="laptopAndiPhoneID1" gradientUnits="userSpaceOnUse" x1="403.8206" y1="559.1469" x2="594.97" y2="559.1469">
                                <stop offset="5.908129e-07" style="stop-color:#F0F1F2"></stop>
                                <stop offset="5.235744e-02" style="stop-color:#F6F7F8"></stop>
                                <stop offset="0.1708" style="stop-color:#FDFDFD"></stop>
                                <stop offset="0.5" style="stop-color:#FFFFFF"></stop>
                                <stop offset="0.8292" style="stop-color:#FDFDFD"></stop>
                                <stop offset="0.9476" style="stop-color:#F6F7F8"></stop>
                                <stop offset="1" style="stop-color:#F0F1F2"></stop>
                            </linearGradient>
                            <path fill="url(#laptopAndiPhoneID1)" d="M591.4,562.7H407.4c-1.9,0-3.5-1.6-3.5-3.5v-3.5H595v3.5C595,561.1,593.4,562.7,591.4,562.7z"></path>
                            <g>
                                <defs>
                                    <rect id="SVGID_2_" x="121.7" y="38" width="752.5" height="469.7"></rect>
                                </defs>
                                <clipPath id="SVGID_3_">
                                    <use xlink:href="#SVGID_2_" style="overflow:visible;"></use>
                                </clipPath>
                                <g style="clip-path:url(#SVGID_3_);">
                                    <!-- Apply your (1618px width to 1010px height) image here -->
                                    <image id="SVGlaptopAndIphoneImg1" style="overflow:visible;" width="1618" height="1010" xlink:href="/images/img2.jpg" transform="matrix(0.4651 0 0 0.4651 121.7472 37.9679)"></image>
                                </g>
                                <use xlink:href="#SVGID_2_" style="overflow:visible;fill:none;stroke:#E7EAF3;stroke-miterlimit:10;"></use>
                            </g>
                            <path class="laptop-and-iphone-0 fill-white stroke-gray-300" stroke-miterlimit="10" d="M944,577H823.1c-29.7,0-54-24.3-54-54V150.9c0-29.7,24.3-54,54-54H944c29.7,0,54,24.3,54,54V523  C998,552.7,973.7,577,944,577z"></path>
                            <circle class="laptop-and-iphone-1 fill-gray-200" cx="884.3" cy="543.4" r="18.4"></circle>
                            <path class="laptop-and-iphone-4 fill-gray-200" fill-rule="evenodd" clip-rule="evenodd" d="M899.1,133.7h-30.3c-1.6,0-2.9-1.3-2.9-2.9l0,0c0-1.6,1.3-2.9,2.9-2.9h30.3c1.6,0,2.9,1.3,2.9,2.9l0,0  C902,132.4,900.7,133.7,899.1,133.7z"></path>
                            <g>
                                <defs>
                                    <rect id="SVGID_4_" x="783.1" y="154.8" width="202.2" height="361"></rect>
                                </defs>
                                <clipPath id="SVGID_5_">
                                    <use xlink:href="#SVGID_4_" style="overflow:visible;"></use>
                                </clipPath>
                                <g style="clip-path:url(#SVGID_5_);">
                                    <!-- Apply your (282px width to 500px height) image here -->
                                    <image id="SVGlaptopAndIphoneImg2" style="overflow:visible;" width="282" height="500" xlink:href="/images/img8.jpg" transform="matrix(0.722 0 0 0.722 782.1237 155.3553)"></image>
                                </g>
                                <use xlink:href="#SVGID_4_" style="overflow:visible;fill:none;stroke:#E7EAF3;stroke-miterlimit:10;"></use>
                            </g>
</svg>
                    </figure>
                </div>
                <!-- End SVG Mockups -->

                <div class="container">
                    <div class="row justify-content-lg-end">
                        <div class="col-lg-5">
                            <!-- Title -->
                            <div class="pl-lg-4">
                                <div class="mb-5">
                                    <h2 class="font-weight-medium">全平台适配</h2>
                                    <p>

                                        我们针对桌面电脑、移动手机进行了大量调优。让你可以在全平台轻松交流学习，不受时间地点限制影响学习计划。

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
        <div class="u-bg-light-blue-50">
            <div class="container u-space-3">
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-9">
          <span class="u-icon u-icon-primary--air u-icon--xl rounded-circle mb-4">
            <span class="far fa-thumbs-up u-icon__inner"></span>
          </span>
                    <h2 class="font-weight-medium">感谢助力</h2>
                </div>
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
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('images/avatar/1.jpeg')}}" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="h6 mb-1">清****</h4>
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
                        </div>
                    </div>
                    <div class="js-slide mb-1">
                        <div class="d-flex align-items-start flex-column bg-white border rounded p-5">
                            <div class="mb-auto">
                                <p>
                                    老师技术挺牛的，可惜速度太快，自己对laravel新手，希望以后会进步吧。
                                    向军大叔主讲【laravel小白入门篇】通俗易懂！有课程视频可回放学习。免费授课，机会难得。
                                </p>
                            </div>
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('images/avatar/2.jpeg')}}" alt="Image Description">
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
                        </div>
                    </div>
                    <div class="js-slide mb-1">
                        <div class="d-flex align-items-start flex-column bg-white border rounded p-5">
                            <div class="mb-auto">
                                <p>老师很实在，由浅入深，讲得非常棒，容易懂，期待老师的下次直播课。</p>
                            </div>
                            <div class="media">
                                <div class="d-flex mr-3">
                                    <img class="img-fluid u-avatar rounded-circle"
                                         src="{{asset('images/avatar/3.gif')}}" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="h6 mb-1">阿****</h4>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center u-space-3">
            <div class="w-md-60 text-center mx-auto mb-6">
                <h2 class="font-weight-medium">已有 <strong class="text-primary">{{\App\User::count()}}</strong>
                    位编程爱好者与你共同学习
                </h2>
            </div>
            <div class="mb-6">
                <a class="btn btn-primary u-btn-primary u-btn-wide transition-3d-hover" href="{{route('edu.dynamic.index')}}">进入社区、结交志同道合的朋友</a>
            </div>
        </div>
        <hr class="my-0">
    </main>
@endsection