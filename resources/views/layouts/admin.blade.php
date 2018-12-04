<!DOCTYPE html>
<!--
website: 后盾人
Author: 向军大叔
Website: http://www.aoxiangjun.com
Email: 2300071698@qq.com
Follow: https://space.bilibili.com/277339333
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config_get('admin.site.webname')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="{{asset('org/keen/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--begin::Web font -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>--}}
    <script src="https://cdn.bootcss.com/webfont/1.6.28/webfontloader.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Page Vendors Styles -->
    {{--<link href="{{asset('org/keen/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
    <!--end::Page Vendors Styles -->
    <!--begin::Global Theme Styles -->
    {{--<link href="/org/keen/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />--}}
    <link href="/org/keen/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins -->
    <link href="/org/keen/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="/org/keen/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="/org/keen/demo/default/skins/brand/navy.css" rel="stylesheet" type="text/css"/>
    <link href="/org/keen/demo/default/skins/aside/navy.css" rel="stylesheet" type="text/css"/><!--end::Layout Skins -->
    <link rel="shortcut icon" href="/favicon.ico"/>
    <!-- Hotjar Tracking Code for keenthemes.com -->
    {{--<script>--}}
    {{--(function(h,o,t,j,a,r){--}}
    {{--h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};--}}
    {{--h._hjSettings={hjid:1070954,hjsv:6};--}}
    {{--a=o.getElementsByTagName('head')[0];--}}
    {{--r=o.createElement('script');r.async=1;--}}
    {{--r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;--}}
    {{--a.appendChild(r);--}}
    {{--})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');--}}
    {{--</script>--}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>--}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    @stack('css')
</head>
<!-- end::Head -->
<!-- begin::Body -->
<body class="k-header--static k-header-mobile--fixed k-aside--enabled k-aside--fixed">
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="k_header_mobile" class="k-header-mobile  k-header-mobile--fixed ">
    <div class="k-header-mobile__logo">
        <a href="/" target="_blank">
            <img alt="Logo" src="{{config_get('admin.site.logo',asset('images/logo.png'))}}"/>
        </a>
    </div>
    <div class="k-header-mobile__toolbar">
        <button class="k-header-mobile__toolbar-toggler k-header-mobile__toolbar-toggler--left"
                id="k_aside_mobile_toggler"><span></span></button>
        <button class="k-header-mobile__toolbar-toggler" id="k_header_mobile_toggler"><span></span></button>
        <button class="k-header-mobile__toolbar-topbar-toggler" id="k_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="k-grid k-grid--hor k-grid--root">
    <div class="k-grid__item k-grid__item--fluid k-grid k-grid--ver k-page">
        <!-- begin:: Aside -->
        <button class="k-aside-close" id="k_aside_close_btn">
            <i class="la la-close"></i>
        </button>
        <div class="k-aside k-aside--fixed k-grid__item k-grid k-grid--desktop k-grid--hor-desktop" id="k_aside">
            <!-- begin:: Aside Menu -->
            @include('layouts._admin_menu')
            <!-- end:: Aside Menu -->
            <!-- begin:: Aside -->
            <div class="k-aside__footer	k-grid__item" id="k_aside_footer">
                <div class="k-aside__footer-nav">
                    <div class="k-aside__footer-item">
                        <a href="{{route('admin.config.edit','site')}}" class="btn btn-icon">
                            <i class="flaticon2-gear"></i>
                        </a>
                    </div>
                    <div class="k-aside__footer-item">
                        <a href="{{route('admin.update.cache')}}" class="btn btn-icon">
                            <i class="flaticon2-cube"></i>
                        </a>
                    </div>

                    <div class="k-aside__footer-item">
                        <button type="button" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class="flaticon2-add"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-left">
                            <ul class="k-nav">
                                <li class="k-nav__section k-nav__section--first">
                                    <span class="k-nav__section-text">发布内容</span>
                                </li>
                                <li class="k-nav__item">
                                    <a href="#" class="k-nav__link">
                                        <i class="k-nav__link-icon la la-file-text-o"></i>
                                        <span class="k-nav__link-text">文章</span>
                                    </a>
                                </li>
                                <li class="k-nav__item">
                                    <a href="#" class="k-nav__link">
                                        <i class="k-nav__link-icon la la-file-pdf-o"></i>
                                        <span class="k-nav__link-text">课程</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end:: Aside -->    </div>
        <!-- end:: Aside -->
        <div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor k-wrapper" id="k_wrapper">
            <!-- begin:: Header -->
            <div id="k_header" class="k-header k-grid__item ">
                <!-- begin: Header Menu -->
                <button class="k-header-menu-wrapper-close" id="k_header_menu_mobile_close_btn"><i
                            class="la la-close"></i></button>
                <div class="k-header-menu-wrapper" id="k_header_menu_wrapper">
                    <div id="k_header_menu" class="k-header-menu k-header-menu-mobile ">
                        <ul class="k-menu__nav ">
                            <li class="k-menu__item  k-menu__item--submenu k-menu__item--rel
                                {{active_class(if_uri_pattern('*content*'),'k-menu__item--active')}}"
                                data-kmenu-submenu-toggle="click" data-kmenu-link-redirect="1" aria-haspopup="true"><a
                                        href="javascript:;" class="k-menu__link k-menu__toggle"><span
                                            class="k-menu__link-text">文章系统</span><i
                                            class="k-menu__hor-arrow la la-angle-down"></i><i
                                            class="k-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="k-menu__submenu k-menu__submenu--classic k-menu__submenu--left">
                                    <ul class="k-menu__subnav">
                                        @foreach(module_menu('content')['menus'] as $menu)
                                            @if(auth()->user()->hasAnyPermission($menu['permission']))
                                                <li class="k-menu__item " data-kmenu-link-redirect="1"
                                                    aria-haspopup="true">
                                                    <a href="{{$menu['route']}}" class="k-menu__link">
                                                        <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                        <span class="k-menu__link-text">{{$menu['name']}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="k-menu__item  k-menu__item--submenu k-menu__item--rel
                                {{active_class(if_uri_pattern('*edu*'),'k-menu__item--active')}}"
                                data-kmenu-submenu-toggle="click" data-kmenu-link-redirect="1" aria-haspopup="true"><a
                                        href="javascript:;" class="k-menu__link k-menu__toggle"><span
                                            class="k-menu__link-text">在线教育</span><i
                                            class="k-menu__hor-arrow la la-angle-down"></i><i
                                            class="k-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="k-menu__submenu k-menu__submenu--classic k-menu__submenu--left">
                                    <ul class="k-menu__subnav">
                                        @foreach(module_menu('edu')['menus'] as $menu)
                                            @if(auth()->user()->hasAnyPermission($menu['permission']))
                                                <li class="k-menu__item " data-kmenu-link-redirect="1" aria-haspopup="true">
                                                    <a href="{{$menu['route']}}" class="k-menu__link">
                                                        <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                        <span class="k-menu__link-text">{{$menu['name']}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="k-menu__item  k-menu__item--submenu k-menu__item--rel"
                                data-kmenu-submenu-toggle="click" data-kmenu-link-redirect="1" aria-haspopup="true"><a
                                        href="javascript:;" class="k-menu__link k-menu__toggle"><span
                                            class="k-menu__link-text">扩展插件</span><i
                                            class="k-menu__hor-arrow la la-angle-down"></i><i
                                            class="k-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="k-menu__submenu k-menu__submenu--classic k-menu__submenu--left">
                                    <ul class="k-menu__subnav">
                                        @foreach(menus('admin_menu') as $module)
                                            @if(auth()->user()->hasAnyPermission($module['permission']) && !$module['system'])
                                                <li class="k-menu__item " data-kmenu-link-redirect="1"
                                                    aria-haspopup="true">
                                                    <a href="/{{$module['module']}}" class="k-menu__link">
                                                        <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                        <span class="k-menu__link-text">{{$module['title']}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end: Header Menu -->        <!-- begin:: Header Topbar -->
                <div class="k-header__topbar">
                    <!--begin: Search -->

                    <!--end: Search -->

                    <!--begin: Notifications -->
                    <div class="k-header__topbar-item dropdown">
                        <div class="k-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px -2px">
                            <span class="k-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
                            @if(auth()->user()->unreadNotifications->count())
                                <span class="k-badge k-badge--dot k-badge--notify k-badge--sm k-badge--brand"></span>
                            @endif
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <div class="k-head" style="background-image: url(/org/keen/media/misc/head_bg_sm.jpg)">
                                <h3 class="k-head__title">通知消息</h3>
                                <div class="k-head__sub"><span class="k-head__desc">
                                        {{auth()->user()->unreadNotifications->count()}} 条通知</span></div>
                            </div>
                            <div class="k-notification k-margin-t-30 k-margin-b-20 k-scroll" data-scroll="true"
                                 data-height="270" data-mobile-height="220">
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <a href="{{route('member.notification.show',$notification)}}"
                                       class="k-notification__item" target="_blank">
                                        <div class="k-notification__item-icon">
                                            <img src="{{$notification['data']['user_icon']}}" class="mr-2"
                                                 style="width: 30px;height: 30px;border-radius: 50%">
                                        </div>
                                        <div class="k-notification__item-details">
                                            <div class="k-notification__item-title">
                                                {{$notification['data']['user_name']}} {{$notification['data']['active']??''}}  {{$notification['data']['title']}}
                                            </div>
                                            <div class="k-notification__item-time">
                                                {{$notification->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end: Notifications -->
                    <!--begin: Quick actions -->

                    <!--end: Quick actions -->
                    <!--begin: Language bar -->
                    <!--end: Language bar -->
                    <!--begin: User bar -->
                    <div class="k-header__topbar-item k-header__topbar-item--user">
                        <div class="k-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px -2px">
                            <div class="k-header__topbar-user">
                                <span class="k-header__topbar-welcome k-hidden-mobile">Hi,</span>
                                <span class="k-header__topbar-username k-hidden-mobile">{{auth()->user()->name}}</span>
                                <img alt="Pic" src="{{auth()->user()->avatar}}" style="width: 30px;height: 30px;"/>
                                <!--use below badge element instead the user avatar to display username's first letter(remove k-hidden class to display it) -->
                                <span class="k-badge k-badge--username k-badge--lg k-badge--brand k-hidden">A</span>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-md">
                            <div class="k-user-card k-margin-b-50 k-margin-b-30-tablet-and-mobile"
                                 style="background-image: url(/org/keen/media/misc/head_bg_sm.jpg)">
                                <div class="k-user-card__wrapper">
                                    <div class="k-user-card__pic">
                                        <img alt="Pic" src="{{auth()->user()->avatar}}" style="width: 30px;height: 30px;"/>
                                    </div>
                                    <div class="k-user-card__details">
                                        <div class="k-user-card__name">{{auth()->user()->name}}</div>
                                        <div class="k-user-card__position">UID: {{auth()->id()}}</div>
                                    </div>
                                </div>
                            </div>

                            <ul class="k-nav k-margin-b-10">
                                <li class="k-nav__item">
                                    <a href="{{route('member.user.show',auth()->user())}}" class="k-nav__link">
                                        <span class="k-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
                                        <span class="k-nav__link-text">个人中心</span>
                                    </a>
                                </li>
                                <li class="k-nav__item">
                                    <a href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}"
                                       class="k-nav__link">
                                        <span class="k-nav__link-icon"><i class="flaticon2-browser-2"></i></span>
                                        <span class="k-nav__link-text">修改密码</span>
                                    </a>
                                </li>
                                <li class="k-nav__item k-nav__item--custom k-margin-t-15">
                                    <a href="{{route('logout')}}" target="_blank"
                                       class="btn btn-outline-metal btn-hover-brand btn-upper btn-font-dark btn-sm btn-bold">
                                        退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end: User bar -->

                    <!--begin: Quick panel toggler -->

                    <!--end: Quick panel toggler --></div>
                <!-- end:: Header Topbar --></div>
            <!-- end:: Header -->                <!-- begin:: Content -->
            <div class="k-content	k-grid__item k-grid__item--fluid k-grid k-grid--hor" id="k_content">
                <!-- begin:: Content Head -->
            @yield('content')
            <!-- end:: Content Head --> <!-- begin:: Content Body -->

                <!-- end:: Content Body -->
            </div>
            <!-- end:: Content -->                <!-- begin:: Footer -->
            <div class="k-footer k-grid__item k-grid k-grid--desktop k-grid--ver-desktop">
                <div class="k-footer__copyright">
                    2018&nbsp;&copy;&nbsp;<a href="http://hdcms.com" target="_blank" class="k-link">hdcms</a>&nbsp;
                    不断更新功能，提供功能丰富、系统稳定的开源产品。
                </div>
                <div class="k-footer__menu">
                    <a href="https://www.houdunren.com" target="_blank" class="k-footer__menu-link k-link">教程</a>
                    <a href="https://www.houdunren.com" target="_blank" class="k-footer__menu-link k-link">手册</a>
                </div>
            </div>
            <!-- end:: Footer -->            </div>

    </div>
</div>

<!-- end:: Page -->

<!-- begin:: Topbar Offcanvas Panels -->
<!-- begin::Offcanvas Toolbar Search -->

<!-- end::Offcanvas Toolbar Search -->

<!-- begin::Offcanvas Toolbar Quick Actions -->

<!-- end::Offcanvas Toolbar Quick Actions --><!-- end:: Topbar Offcanvas Panels -->

<!-- begin::Quick Panel -->

<!-- end::Quick Panel -->


<!-- begin::Scrolltop -->
<div id="k_scrolltop" class="k-scrolltop">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scrolltop -->
<!-- begin::Sticky Toolbar -->

<!-- end::Sticky Toolbar -->
<!-- begin::Demo Panel -->

<div id="k_demo_panel" class="k-demo-panel">

</div>
<!-- end::Demo Panel -->
<!-- begin::Global Config -->
<script>
    var KAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "metal": "#c4c5d6",
                "light": "#ffffff",
                "accent": "#00c5dc",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995",
                "focus": "#9816f4"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>
@include('layouts._hdjs_keen')
@include('layouts._message')
<script>
    require(['jquery', 'perfect-scrollbar', 'js.cookie', 'bootstrap'], function ($, PerfectScrollbar, Cookies) {
        window.Cookies = Cookies;
        window.PerfectScrollbar = PerfectScrollbar;
        require(['app'])
    })
</script>
@stack('js')
<script src="{{mix('/js/hdcms.js')}}"></script>
<!-- end::Global Config -->

<!--begin::Global Theme Bundle -->
{{--<script src="/org/keen/vendors/base/vendors.bundle.js" type="text/javascript"></script>--}}
{{--<script src="/org/keen/demo/default/base/scripts.bundle.js" type="text/javascript"></script>--}}
<!--end::Global Theme Bundle -->


<!--begin::Page Vendors -->
{{--<script src="/org/keen/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}
<!--end::Page Vendors -->
<!--begin::Page Scripts -->
{{--<script src="/org/keen/app/scripts/custom/dashboard.js" type="text/javascript"></script>--}}
<!--end::Page Scripts -->
<!--begin::Global App Bundle -->
{{--<script src="/org/keen/app/scripts/bundle/app.bundle.js" type="text/javascript"></script>--}}
<!--end::Global App Bundle -->
</body>
<!-- end::Body -->
</html>