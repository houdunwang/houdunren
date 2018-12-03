<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config_get('admin.site.webname')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="stylesheet" href="/css/bootstrap.css">--}}
    <link rel="stylesheet" href="/org/front/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/hs.megamenu.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{{asset('org/front')}}/css/front.css">
    <link href="{{asset('org/hdjs/package/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('org/front/css/theme.css')}}">
    @include('layouts._hdjs')
    @include('layouts._message')
    @stack('css')
</head>
<body>
@include('layouts._web_header')
<main id="content" role="main">
    <div class="bg-primary" style="background-image: linear-gradient(150deg, #2d1582 0%, #19a0ff 100%)">
        <div class="container space-top-1 pb-3">
            <div class="row">
                <div class="col-lg-5 order-lg-2 text-lg-right mb-4 mb-lg-0">
                    <div class="d-flex d-lg-inline-block justify-content-between justify-content-lg-end align-items-center align-items-lg-start">
                        <!-- Breadcrumb Nav Toggle Button -->
                        <div class="d-lg-none">
                            <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white"
                                    aria-label="Toggle navigation" aria-expanded="false"
                                    aria-controls="breadcrumbNavBar" data-toggle="collapse"
                                    data-target="#breadcrumbNavBar">
                              <span id="breadcrumbHamburgerTrigger" class="u-hamburger__box">
                                <span class="u-hamburger__inner"></span>
                              </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1">
                    <!-- User Info -->
                    <div class="media d-block d-sm-flex align-items-sm-center">
                        <div class="u-lg-avatar position-relative mb-3 mb-sm-0 mr-3">
                            <img class="u-lg-avatar rounded-circle" src="{{$user->avatar}}" alt="{{$user->name}}">
                            @if(auth()->user()->following($user))
                                <span class="badge badge-md badge-outline-success badge-pos badge-pos--bottom-right rounded-circle">
                                  <span class="fas fa-check"></span>
                                </span>
                            @endif
                        </div>
                        <div class="media-body">
                            <h1 class="h3 text-white font-weight-medium mb-1">{{$user->name}}</h1>
                            <span class="d-block text-white"> 第 {{$user['id']}} 位会员</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container space-bottom-1 space-bottom-lg-0">
            <div class="d-lg-flex justify-content-lg-between align-items-lg-center">
                <!-- Navbar -->
                <div class="u-header u-header-left-aligned-nav u-header--bg-transparent-lg u-header--white-nav-links z-index-4">
                    <div class="u-header__section bg-transparent">
                        <nav class="js-breadcrumb-menu navbar navbar-expand-lg u-header__navbar u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                            <div id="breadcrumbNavBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav">
                                    <li class="nav-item hs-has-sub-menu u-header__nav-item hs-sub-menu-opened"
                                        data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                        <a id="generalDropdown"
                                           class="nav-link u-header__nav-link"
                                           href="{{route('member.space.dynamic',$user)}}" aria-haspopup="true"
                                           aria-expanded="false"
                                           aria-labelledby="generalDropdownMenu">
                                            动态
                                        </a>
                                    </li>
                                    <li class="nav-item hs-has-sub-menu u-header__nav-item hs-sub-menu-opened"
                                        data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                        <a id="generalDropdown"
                                           class="nav-link u-header__nav-link"
                                           href="{{route('member.space.fans',$user)}}" aria-haspopup="true"
                                           aria-expanded="false"
                                           aria-labelledby="generalDropdownMenu">
                                            粉丝列表
                                        </a>
                                    </li>
                                    <li class="nav-item hs-has-sub-menu u-header__nav-item hs-sub-menu-opened"
                                        data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                        <a id="generalDropdown"
                                           class="nav-link u-header__nav-link"
                                           href="{{route('member.space.follower',$user)}}" aria-haspopup="true"
                                           aria-expanded="false"
                                           aria-labelledby="generalDropdownMenu">
                                            关注列表
                                        </a>
                                    </li>
                                    @foreach(menus('space_menu') as $menus)
                                        @foreach($menus as $menu)
                                            <li class="nav-item hs-has-sub-menu u-header__nav-item hs-sub-menu-opened"
                                                data-event="hover" data-animation-in="slideInUp"
                                                data-animation-out="fadeOut">
                                                <a id="generalDropdown"
                                                   class="nav-link u-header__nav-link"
                                                   href="{{route($menu['route'],$user)}}" aria-haspopup="true"
                                                   aria-expanded="false"
                                                   aria-labelledby="generalDropdownMenu">
                                                    {{$menu['name']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- End Navbar -->
                <div class="ml-lg-auto">
                    @can('follow',$user)
                        @if(auth()->user()->following($user))
                            <a class="btn btn-sm btn-soft-white transition-3d-hover"
                               href="{{route('member.follow',$user)}}">
                                <span class="fas fa-plus small mr-2"></span> 已关注
                            </a>
                        @else
                            <a class="btn btn-sm btn-light transition-3d-hover"
                               href="{{route('member.follow',$user)}}">
                                <span class="fas fa-plus small mr-2"></span> 关注 TA
                            </a>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light mt-5">
        @yield('content')
    </div>
</main>
{{--@yield('content')--}}
@include('layouts._web_footer')
@stack('js')
</body>
</html>