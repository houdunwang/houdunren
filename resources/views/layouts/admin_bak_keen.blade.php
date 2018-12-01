<!DOCTYPE html>
<!--
website: 后盾人
Author: 向军大叔
Website: http://www.aoxiangjun.com
Email: 2300071698@qq.com
Follow: https://space.bilibili.com/277339333
-->
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>{{config_get('admin.site.webname')}}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!--begin::Web font -->
    <script src="https://cdn.bootcss.com/webfont/1.6.28/webfontloader.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
        // WebFont.load({
        //     google: {
        //         families: ['Droid Sans', 'Droid Serif']
        //     }
        // });
    </script>
    <!--end::Web font -->
    <!--begin::Page Vendors Styles -->
    <link href="{{asset('org/keen')}}/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
          type="text/css"/>

    <!--end::Page Vendors Styles -->
    <!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('org/keen/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"
          type="text/css"/>
    <!--end:: Global Mandatory Vendors -->
    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('org/keen')}}/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet"
          type="text/css"/>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="{{asset('org/keen')}}/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins -->
    <link href="{{asset('org/keen')}}/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/demo/default/skins/brand/light.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('org/keen')}}/demo/default/skins/aside/light.css" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/favicon.ico"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="k-header--fixed k-header-mobile--fixed k-aside--enabled k-aside--fixed">

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
        <button class="k-aside-close " id="k_aside_close_btn"><i class="la la-close"></i></button>
        <div class="k-aside  k-aside--fixed 	k-grid__item k-grid k-grid--desktop k-grid--hor-desktop" id="k_aside">

            <!-- begin:: Aside -->
            <div class="k-aside__brand	k-grid__item " id="k_aside_brand">
                <div class="k-aside__brand-logo">
                    <a href="/" target="_blank">
                        <img alt="Logo" src="{{config_get('admin.site.logo',asset('images/logo.png'))}}"/>
                    </a>
                </div>
                <div class="k-aside__brand-tools">
                    <button class="k-aside__brand-aside-toggler k-aside__brand-aside-toggler--left"
                            id="k_aside_toggler"><span></span></button>
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
        @include('layouts._admin_menu')

        <!-- end:: Aside Menu -->

            <!-- begin:: Aside -->
            <div class="k-aside__footer		k-grid__item" id="k_aside_footer">
                <div class="k-aside__footer-nav">
                    <div class="k-aside__footer-item">
                        <a href="{{route('admin.config.edit','site')}}" class="btn btn-icon"><i class="flaticon2-gear"></i></a>
                    </div>
                    <div class="k-aside__footer-item">
                        <a href="{{route('admin.update.cache')}}" class="btn btn-icon"><i class="flaticon2-cube"></i></a>
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

            <!-- end:: Aside -->
        </div>

        <!-- end:: Aside -->
        <div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor k-wrapper" id="k_wrapper">

            <!-- begin:: Header -->
            <div id="k_header" class="k-header k-grid__item  k-header--fixed ">

                <!-- begin: Header Menu -->
                <button class="k-header-menu-wrapper-close" id="k_header_menu_mobile_close_btn"><i
                            class="la la-close"></i></button>
                <div class="k-header-menu-wrapper" id="k_header_menu_wrapper">
                    <div id="k_header_menu" class="k-header-menu k-header-menu-mobile ">
                        <ul class="k-menu__nav ">
                            <li class="k-menu__item  k-menu__item--submenu k-menu__item--rel"
                                data-kmenu-submenu-toggle="click" data-kmenu-link-redirect="1" aria-haspopup="true"><a
                                        href="javascript:;" class="k-menu__link k-menu__toggle"><span
                                            class="k-menu__link-text">扩展</span><i
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
                <!-- end: Header Menu -->
                <!-- begin:: Header Topbar -->
                <div class="k-header__topbar">
                    <!--begin: Search -->
                    <!--end: Search -->
                    <!--begin: Notifications -->
                    <div class="k-header__topbar-item dropdown">
                        <div class="k-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px -2px">
                            <span class="k-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
                            <span class="k-badge k-badge--dot k-badge--notify k-badge--sm k-badge--brand"></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <div class="k-head"
                                 style="background-image: url({{asset('org/keen')}}/media/misc/head_bg_sm.jpg)">
                                <h3 class="k-head__title">通知消息</h3>
                                <div class="k-head__sub"><span class="k-head__desc">23 new notifications</span></div>
                            </div>
                            <div class="k-notification k-margin-t-30 k-margin-b-20 k-scroll" data-scroll="true"
                                 data-height="270" data-mobile-height="220">
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-line-chart k-font-success"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New order has been received
                                        </div>
                                        <div class="k-notification__item-time">
                                            2 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-box-1 k-font-brand"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New customer is registered
                                        </div>
                                        <div class="k-notification__item-time">
                                            3 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-chart2 k-font-danger"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            Application has been approved
                                        </div>
                                        <div class="k-notification__item-time">
                                            3 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-image-file k-font-warning"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New file has been uploaded
                                        </div>
                                        <div class="k-notification__item-time">
                                            5 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-bar-chart k-font-info"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New user feedback received
                                        </div>
                                        <div class="k-notification__item-time">
                                            8 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-pie-chart-2 k-font-success"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            System reboot has been successfully completed
                                        </div>
                                        <div class="k-notification__item-time">
                                            12 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-favourite k-font-focus"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New order has been placed
                                        </div>
                                        <div class="k-notification__item-time">
                                            15 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item k-notification__item--read">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-safe k-font-primary"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            Company meeting canceled
                                        </div>
                                        <div class="k-notification__item-time">
                                            19 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-psd k-font-success"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New report has been received
                                        </div>
                                        <div class="k-notification__item-time">
                                            23 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon-download-1 k-font-danger"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            Finance report has been generated
                                        </div>
                                        <div class="k-notification__item-time">
                                            25 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon-security k-font-warning"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New customer comment recieved
                                        </div>
                                        <div class="k-notification__item-time">
                                            2 days ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="k-notification__item">
                                    <div class="k-notification__item-icon">
                                        <i class="flaticon2-pie-chart k-font-focus"></i>
                                    </div>
                                    <div class="k-notification__item-details">
                                        <div class="k-notification__item-title">
                                            New customer is registered
                                        </div>
                                        <div class="k-notification__item-time">
                                            3 days ago
                                        </div>
                                    </div>
                                </a>
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
                                <img alt="Pic" src="{{auth()->user()->avatar}}"/>

                                <!--use below badge element instead the user avatar to display username's first letter(remove k-hidden class to display it) -->
                                <span class="k-badge k-badge--username k-badge--lg k-badge--brand k-hidden">A</span>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-md">
                            <div class="k-user-card k-margin-b-50 k-margin-b-30-tablet-and-mobile"
                                 style="background-image: url({{asset('org/keen')}}/media/misc/head_bg_sm.jpg)">
                                <div class="k-user-card__wrapper">
                                    <div class="k-user-card__pic">
                                        <img alt="Pic" src="{{auth()->user()->avatar}}"/>
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


                    <!--end: Quick panel toggler -->
                </div>

                <!-- end:: Header Topbar -->
            </div>

            <!-- end:: Header -->

            <!-- begin:: Content -->
            <div class="k-content	k-grid__item k-grid__item--fluid k-grid k-grid--hor" id="k_content">

                <!-- begin:: Content Head -->

                <!-- end:: Content Head -->
                <!-- begin:: Content Body -->
                <div class="k-content__body	k-grid__item k-grid__item--fluid" id="k_content_body">
                    <!--begin::Dashboard 4-->
                    <!--begin::Row-->
                {{--<div class="row">--}}
                @yield('content')
                {{--</div>--}}
                <!--end::Row-->
                    <!--end::Dashboard 4-->
                </div>
                <!-- end:: Content Body -->
            </div>
            <!-- end:: Content -->
            <!-- begin:: Footer -->
            <div class="k-footer	k-grid__item k-grid k-grid--desktop k-grid--ver-desktop">
                <div class="k-footer__copyright">
                    2018&nbsp;&copy;&nbsp;<a href="http://hdcms.com" target="_blank"
                                             class="k-link">hdcms</a>
                </div>
                <div class="k-footer__menu">
                    <a href="https://www.houdunren.com" target="_blank" class="k-footer__menu-link k-link">教程</a>
                    <a href="https://www.houdunren.com" target="_blank" class="k-footer__menu-link k-link">手册</a>
                </div>
            </div>

            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin:: Topbar Offcanvas Panels -->

<!-- begin::Offcanvas Toolbar Search -->


<!-- end::Offcanvas Toolbar Search -->

<!-- begin::Offcanvas Toolbar Quick Actions -->


<!-- end::Offcanvas Toolbar Quick Actions -->

<!-- end:: Topbar Offcanvas Panels -->

<!-- begin::Quick Panel -->


<!-- end::Quick Panel -->

<!-- begin::Scrolltop -->
<div id="k_scrolltop" class="k-scrolltop">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- end::Sticky Toolbar -->

<!-- begin::Demo Panel -->
<div id="k_demo_panel" class="k-demo-panel">
    <div class="k-demo-panel__head">
        <h3 class="k-demo-panel__title">
            Select A Demo

            <!--<small>5</small>-->
        </h3>
        <a href="#" class="k-demo-panel__close" id="k_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="k-demo-panel__body">
        <div class="k-demo-panel__item k-demo-panel__item--active">
            <div class="k-demo-panel__item-title">
                Default
            </div>
            <div class="k-demo-panel__item-preview">
                <img src="{{asset('org/keen')}}/media/demos-mini/default.png" alt=""/>
                <div class="k-demo-panel__item-preview-overlay">
                    <a href="../default/index.html" class="btn btn-brand btn-elevate" target="_blank">Preview</a>
                </div>
            </div>
        </div>
        <div class="k-demo-panel__item ">
            <div class="k-demo-panel__item-title">
                Demo 2
            </div>
            <div class="k-demo-panel__item-preview">
                <img src="{{asset('org/keen')}}/media/demos-mini/demo2.png" alt=""/>
                <div class="k-demo-panel__item-preview-overlay">
                    <a href="../demo2/index.html" class="btn btn-brand btn-elevate" target="_blank">Preview</a>
                </div>
            </div>
        </div>
        <div class="k-demo-panel__item ">
            <div class="k-demo-panel__item-title">
                Demo 3
            </div>
            <div class="k-demo-panel__item-preview">
                <img src="{{asset('org/keen')}}/media/demos-mini/demo3.png" alt=""/>
                <div class="k-demo-panel__item-preview-overlay">
                    <a href="../demo3/index.html" class="btn btn-brand btn-elevate" target="_blank">Preview</a>
                </div>
            </div>
        </div>
        <div class="k-demo-panel__item ">
            <div class="k-demo-panel__item-title">
                Demo 4
            </div>
            <div class="k-demo-panel__item-preview">
                <img src="{{asset('org/keen')}}/media/demos-mini/demo4.png" alt=""/>
                <div class="k-demo-panel__item-preview-overlay">
                    <a href="../demo4/index.html" class="btn btn-brand btn-elevate" target="_blank">Preview</a>
                </div>
            </div>
        </div>
        <div class="k-demo-panel__item ">
            <div class="k-demo-panel__item-title">
                Demo 5
            </div>
            <div class="k-demo-panel__item-preview">
                <img src="{{asset('org/keen')}}/media/demos-mini/demo5.png" alt=""/>
                <div class="k-demo-panel__item-preview-overlay">
                    <a href="../demo5/index.html" class="btn btn-brand btn-elevate" target="_blank">Preview</a>
                </div>
            </div>
        </div>
        <a href="https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/" target="_blank"
           class="k-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
            Buy Keen Now!
        </a>
    </div>
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

<!-- end::Global Config -->


<!--begin:: Global Optional Vendors -->
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/theme/framework/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/theme/framework/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/theme/framework/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/theme/framework/vendors/jquery-validation/init.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/raphael/raphael.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/morris.js/morris.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/custom/theme/framework/vendors/sweetalert2/init.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>--}}

<!--end:: Global Optional Vendors -->

@include('layouts._hdjs_keen')
@include('layouts._message')
<script>
    require(['jquery', 'perfect-scrollbar', 'js.cookie', 'bootstrap'], function ($, PerfectScrollbar, Cookies) {
        window.Cookies = Cookies;
        window.PerfectScrollbar = PerfectScrollbar;
        require(['app'])
    })
</script>
<!--begin:: Global Mandatory Vendors -->
{{--<script src="{{asset('org/keen')}}/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('org/keen')}}/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>--}}
<!--end:: Global Mandatory Vendors -->

<!--begin::Global Theme Bundle -->
{{--<script src="{{asset('org/keen')}}/demo/default/base/scripts.bundle.js" type="text/javascript"></script>--}}

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
{{--1<script src="{{asset('org/keen')}}/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
{{--1<script src="{{asset('org/keen')}}/app/scripts/custom/dashboard.js" type="text/javascript"></script>--}}

<!--end::Page Scripts -->

<!--begin::Global App Bundle -->
{{--<script src="{{asset('org/keen')}}/app/scripts/bundle/app.bundle.js" type="text/javascript"></script>--}}

<!--end::Global App Bundle -->
</body>

<!-- end::Body -->
</html>