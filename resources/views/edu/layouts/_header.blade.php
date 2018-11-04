<a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
    <div class="container">
        <span class="u-skiplink-text">Skip to main content</span>
    </div>
</a>
<!-- ========== HEADER ========== -->
<header id="header" class="u-header">
    <!-- Search -->
    <div id="searchPushTop" class="u-search-push-top">
        <div class="container position-relative">
            <div class="u-search-push-top__content mx-auto">
                <!-- Close Button -->
                <button type="button" class="close u-search-push-top__close-btn"
                        aria-haspopup="true"
                        aria-expanded="false"
                        aria-controls="searchPushTop"
                        data-unfold-type="jquery-slide"
                        data-unfold-target="#searchPushTop">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- End Close Button -->
                <!-- Input -->
                <form class="js-focus-state input-group u-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="输入搜索关键字" name="w"
                               aria-label="Recipient's username"
                               aria-describedby="basic-addon2"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="search('topic')">文章
                            </button>
                            <button class="btn btn-outline-secondary" type="button" onclick="search('video')">课程
                            </button>
                        </div>
                    </div>
                    @push('js')
                        <script>
                            function search(t) {
                                w = $("[name='w']").val();
                                location.href = "{{route('edu.search')}}?w=" + w + "&t=" + t;
                            }
                        </script>
                    @endpush
                </form>
                <!-- End Input -->
            </div>
        </div>
    </div>
    <!-- End Search -->
    <div class="u-header__section">
        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-top-space"
                   href="/" aria-label="Front">
                    <img src="{{config_get('edu.logo',asset('images/front-logo.png'))}}" alt="Logo"
                         style="width: 12rem;margin-top: 5px;">
                </a>
                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
            <span id="hamburgerTrigger" class="u-hamburger__box">
              <span class="u-hamburger__inner"></span>
            </span>
                </button>
                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse py-0">
                    <ul class="navbar-nav u-header__navbar-nav ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link u-header__nav-link" href="{{route('edu.dynamic.index')}}">
                               动态
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link u-header__nav-link" href="{{route('edu.shop.index')}}">
                                订阅
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link u-header__nav-link text-primary" href="{{route('edu.lesson.lists')}}">
                                <strong>碎片</strong>
                            </a>
                        </li>
                    {{--<li class="nav-item hs-has-sub-menu u-header__nav-item"--}}
                    {{--data-event="hover"--}}
                    {{--data-animation-in="slideInUp"--}}
                    {{--data-animation-out="fadeOut">--}}
                    {{--<a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"--}}
                    {{--aria-haspopup="true"--}}
                    {{--aria-expanded="false"--}}
                    {{--aria-labelledby="blogSubMenu">--}}
                    {{--系列--}}
                    {{--<span class="fa fa-angle-down u-header__nav-link-icon"></span>--}}
                    {{--</a>--}}

                    {{--<!-- Blog - Submenu -->--}}
                    {{--<ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0"--}}
                    {{--style="min-width: 220px;"--}}
                    {{--aria-labelledby="blogMegaMenu">--}}
                    {{--<!-- Classic -->--}}
                    {{--<li class="dropdown-item hs-has-sub-menu">--}}
                    {{--<a id="navLinkBlogClassic"--}}
                    {{--class="nav-link u-header__sub-menu-nav-link u-list__link py-2"--}}
                    {{--href="http://houdunren.com">--}}
                    {{--PHP编程零基础入门到提高--}}
                    {{--</a>--}}
                    {{--<a id="navLinkBlogClassic"--}}
                    {{--class="nav-link u-header__sub-menu-nav-link u-list__link py-2"--}}
                    {{--href="http://houdunren.com">--}}
                    {{--Laravel框架开发系列--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- End Submenu -->--}}
                    {{--</li>--}}
                    <!-- Home -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false">
                                话题
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>
                            <!-- Home - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu w-100 u-header__mega-menu-wrapper-v2 ml-1"
                                 style="margin-left: 300px;"
                                 aria-labelledby="homeMegaMenu">
                                <div class="row p-0 mr-0">
                                    <div class="col-lg-9 pr-0">
                                        <div class="d-none d-lg-block u-header__banner-v1"
                                             data-bg-img-src="{{asset('org/front')}}/img/750x750/img1.jpg">
                                            <div class="w-100 text-center u-header__banner-v1-content u-content-centered-y p-4">
                                                <div class="mb-4">
                                                    <strong class="d-block u-header__banner-v1-title mb-2">向军大叔每晚直播</strong>
                                                    <span class="u-header__banner-v1-text">
                                                        技术点均以实战为主，大叔用直播形式教你进行编程世界。
                                                    </span>
                                                </div>
                                                <a class="btn btn-primary u-btn-primary btn-sm transition-3d-hover"
                                                   href="https://ke.qq.com/course/288236?tuin=89184f12" target="_blank">
                                                    进入直播间 <span class="fa fa-angle-right ml-2"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 u-header__mega-menu-wrapper-v3">
                                        <div class="row u-header__mega-menu-wrapper-v1">
                                            <div class="col-sm-12">
                                                <ul class="list-unstyled mb-4 row">
                                                    @foreach(\App\Models\EduCategory::get() as $category)
                                                        <li class="col-sm-12">
                                                            <div class="nav-link u-list__link py-3 px-0">
                                                                <a class="text-secondary"
                                                                   href="{{route('edu.topic_list',$category['id'])}}">
                                                                    <i class="{{$category['icon']}} w-15 pr-0"
                                                                       aria-hidden="true"></i>{{$category['title']}}
                                                                </a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- End Home -->
                        <!-- Blog -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut">
                            <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false"
                               aria-labelledby="blogSubMenu">
                                文档
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>
                            <ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0"
                                style="min-width: 220px;"
                                aria-labelledby="blogMegaMenu">
                                <li class="dropdown-item hs-has-sub-menu">
                                    @foreach(\App\Models\EduDocument::orderBy( 'flag' , 'desc' )->orderBy( 'updated_at' , 'desc' )->limit(5)->get() as $document)
                                        <a id="navLinkBlogClassic"
                                           class="nav-link u-header__sub-menu-nav-link u-list__link py-2"
                                           href="{{route('edu.document.show',$document)}}">
                                            {{$document->title}}
                                        </a>
                                    @endforeach
                                    <a id="navLinkBlogClassic"
                                       class="nav-link u-header__sub-menu-nav-link u-list__link py-2"
                                       href="{{route('edu.document.index')}}">
                                        更多手册
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item hs-has-sub-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut">
                            <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false"
                               aria-labelledby="blogSubMenu">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </a>
                            <ul id="blogSubMenu"
                                class="list-group list-inline hs-sub-menu u-header__sub-menu mb-0 small rounded-0"
                                style="min-width: 220px;"
                                aria-labelledby="blogMegaMenu">
                                @foreach(\App\Models\EduCategory::get() as $category)
                                    <a href="{{route('edu.topic.create',['id'=>$category['id']])}}"
                                       class="list-group-item list-group-item-action rounded-0">
                                        <i class="{{$category['icon']}}" aria-hidden="true"></i> {{$category['title']}}
                                    </a>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="mr-2" href="javascript:;"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false"
                               aria-controls="searchPushTop"
                               data-unfold-type="jquery-slide"
                               data-unfold-target="#searchPushTop">
                                <span class="fa fa-search text-secondary"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    @auth
                                        <a id="sidebarNavToggler"
                                           class="btn btn-xs u-btn-text-secondary u-sidebar--account__toggle-bg pl-1 ml-1"
                                           href="javascript:;" role="button"
                                           aria-controls="sidebarContent"
                                           aria-haspopup="true"
                                           aria-expanded="false"
                                           data-unfold-event="click"
                                           data-unfold-hide-on-scroll="false"
                                           data-unfold-target="#sidebarContent"
                                           data-unfold-type="css-animation"
                                           data-unfold-animation-in="fadeInRight"
                                           data-unfold-animation-out="fadeOutRight"
                                           data-unfold-duration="500">
                                            <span class="position-relative">
                                              <img class="u-sidebar--account__toggle-img"
                                                   src="{{auth()->user()->avatar}}"
                                                   alt="Image Description">
                                                @if(auth()->user()->unreadNotifications->count())
                                                    <span class="u-badge u-badge-success u-badge-pos rounded-circle">
                                                          {{auth()->user()->unreadNotifications->count()}}
                                                      </span>
                                                @endif
                                            </span>
                                        </a>
                                    @else
                                        <a class="btn btn-sm u-btn--icon u-btn-text-secondary"
                                           href="{{route('login')}}">
                                            <span class="fa fa-user-circle u-btn--icon__inner"></span>
                                        </a>
                                    @endauth
                                </li>
                                @auth
                                    <aside id="sidebarContent"
                                           class="u-sidebar u-unfold--css-animation u-unfold--hidden"
                                           aria-labelledby="sidebarNavToggler">
                                        <div class="u-sidebar__scroller">
                                            <div class="u-sidebar__container">
                                                <div class="u-sidebar--account__footer-offset">
                                                    <!-- Toggle Button -->
                                                    <div class="d-flex justify-content-between align-items-center pt-4 px-7">
                                                        <h3 class="h6 mb-0">会员菜单</h3>

                                                        <button type="button" class="close ml-auto"
                                                                aria-controls="sidebarContent"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                data-unfold-event="click"
                                                                data-unfold-hide-on-scroll="false"
                                                                data-unfold-target="#sidebarContent"
                                                                data-unfold-type="css-animation"
                                                                data-unfold-animation-in="fadeInRight"
                                                                data-unfold-animation-out="fadeOutRight"
                                                                data-unfold-duration="500">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- End Toggle Button -->

                                                    <!-- Content -->
                                                    <div class="js-scrollbar u-sidebar__body">
                                                        <!-- Holder Info -->
                                                        <header class="d-flex align-items-center u-sidebar--account__holder mt-3">
                                                            <div class="position-relative">
                                                                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}">
                                                                    <img class="u-sidebar--account__holder-img"
                                                                         src="{{auth()->user()->icon}}"
                                                                         alt="Image Description">
                                                                    <span class="u-badge u-badge--xs u-badge-border-success u-badge-pos rounded-circle"></span>
                                                                </a>
                                                            </div>
                                                            <div class="ml-3">
                                                                <a href="{{route('member.user.edit',[auth()->user(),'type'=>'info'])}}"
                                                                   class="text-dark">
                                                                    {{auth()->user()->name}} <span
                                                                            class="badge u-badge-success ml-1">普通会员</span>
                                                                </a>
                                                                <span class="u-sidebar--account__holder-text">
                                                                    uid: {{auth()->id()}}
                                                                </span>
                                                            </div>
                                                            <div class="btn-group position-relative ml-auto mb-auto">
                                                                <a id="sidebar-account-settings-invoker"
                                                                   class="btn btn-xs u-btn--icon u-btn-text-secondary rounded"
                                                                   href="javascript:;" role="button"
                                                                   aria-controls="sidebar-account-settings"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false"
                                                                   data-toggle="dropdown"
                                                                   data-unfold-event="click"
                                                                   data-unfold-target="#sidebar-account-settings"
                                                                   data-unfold-type="css-animation"
                                                                   data-unfold-duration="300"
                                                                   data-unfold-delay="300"
                                                                   data-unfold-animation-in="slideInUp"
                                                                   data-unfold-animation-out="fadeOut">
                                                                    <span class="fa fa-ellipsis-v u-btn--icon__inner"></span>
                                                                </a>

                                                                <div id="sidebar-account-settings"
                                                                     class="u-unfold right-0 mt-4"
                                                                     aria-labelledby="sidebar-account-settings-invoker">
                                                                    <a class="u-list__link"
                                                                       href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}">设置头像</a>
                                                                    <a class="u-list__link"
                                                                       href="{{route('member.user.edit',[auth()->user(),'type'=>'password'])}}">修改密码</a>
                                                                    <a class="u-list__link"
                                                                       href="{{route('member.user.show',[auth()->user()])}}">我的空间</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="u-list__link"
                                                                       href="{{route('logout')}}">退出</a>
                                                                </div>
                                                            </div>
                                                        </header>
                                                        <div class="u-sidebar__content--account">
                                                            <ul class="list-unstyled u-sidebar--account__list">
                                                                @if(Auth::user()->can('Admin-index'))
                                                                    <li class="u-sidebar--account__list-item">
                                                                        <a class="u-sidebar--account__list-link"
                                                                           href="{{route('admin.admin')}}">
                                                                            <span class="fa fa-cogs u-sidebar--account__list-icon mr-2"></span>
                                                                            后台管理
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                <li class="u-sidebar--account__list-item">
                                                                    <a class="u-sidebar--account__list-link"
                                                                       href="{{route('member.user.edit',[auth()->user(),'type'=>'icon'])}}">
                                                                        <span class="fa fa-user-circle u-sidebar--account__list-icon mr-2"></span>
                                                                        个人中心
                                                                    </a>
                                                                </li>
                                                                {{--<li class="u-sidebar--account__list-item">--}}
                                                                {{--<a class="u-sidebar--account__list-link"--}}
                                                                {{--href="{{route('member.user.edit',[auth()->user(),'type'=>'info'])}}">--}}
                                                                {{--<span class="fa fa-address-book u-sidebar--account__list-icon mr-2"></span>--}}
                                                                {{--我的资料--}}
                                                                {{--</a>--}}
                                                                {{--</li>--}}
                                                                <li class="u-sidebar--account__list-item">
                                                                    <a class="u-sidebar--account__list-link"
                                                                       href="{{route('member.user.show',auth()->user())}}">
                                                                        <span class="fa fa-cubes u-sidebar--account__list-icon mr-2"></span>
                                                                        我的主页
                                                                    </a>
                                                                </li>
                                                                {{--<li class="u-sidebar--account__list-item">--}}
                                                                {{--<a class="u-sidebar--account__list-link"--}}
                                                                {{--href="#">--}}
                                                                {{--<span class="fa fa-cubes u-sidebar--account__list-icon mr-2"></span>--}}
                                                                {{--我的收藏 <span--}}
                                                                {{--class="badge badge-danger float-right mt-1">3</span>--}}
                                                                {{--</a>--}}
                                                                {{--</li>--}}
                                                                <li class="u-sidebar--account__list-item">
                                                                    <a class="u-sidebar--account__list-link"
                                                                       href="{{route('member.notification.index')}}">
                                                                        <span class="fa fa-comments u-sidebar--account__list-icon mr-2"></span>
                                                                        消息中心
                                                                        <span class="badge badge-success">{{auth()->user()->unreadNotifications->count()}}</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!-- End List Links -->

                                                            <div class="u-sidebar--account__list-divider"></div>

                                                            <!-- List Links -->
                                                            <ul class="list-unstyled u-sidebar--account__list">
                                                                <li class="u-sidebar--account__list-item">
                                                                    <a class="u-sidebar--account__list-link"
                                                                       href="{{route('logout')}}">
                                                                        <span class="fa fa-tasks u-sidebar--account__list-icon mr-2"></span>
                                                                        退出登录
                                                                    </a>
                                                                    {{--<a class="u-sidebar--account__list-link"--}}
                                                                    {{--href="{{rou}}">--}}
                                                                    {{--<span class="fa fa-tasks u-sidebar--account__list-icon mr-2"></span>--}}
                                                                    {{--我的文章--}}
                                                                    {{--</a>--}}
                                                                    {{--</li>--}}
                                                                    {{--<li class="u-sidebar--account__list-item">--}}
                                                                    {{--<a class="u-sidebar--account__list-link"--}}
                                                                    {{--href="#">--}}
                                                                    {{--<span class="fa fa-calendar u-sidebar--account__list-icon mr-2"></span>--}}
                                                                    {{--学习记录--}}
                                                                    {{--</a>--}}
                                                                </li>
                                                            </ul>
                                                            <!-- End List Links -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Footer -->
                                                <footer class="u-sidebar__footer u-sidebar__footer--account">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item pr-3">
                                                            <a class="u-sidebar__footer--account__text"
                                                               href="mailto:2300071698@qq.com">问题反馈</a>
                                                        </li>
                                                        {{--<li class="list-inline-item pr-3">--}}
                                                        {{--<a class="u-sidebar__footer--account__text" href="../pages/terms.html">联系我们</a>--}}
                                                        {{--</li>--}}
                                                        {{--<li class="list-inline-item">--}}
                                                        {{--<a class="u-sidebar__footer--account__text" href="../pages/help.html">--}}
                                                        {{--<i class="fa fa-info-circle"></i>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                    </ul>

                                                    <!-- SVG Background Shape -->
                                                    <div class="position-absolute-bottom-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                             viewBox="0 0 300 126.5"
                                                             style="margin-bottom: -5px; enable-background:new 0 0 300 126.5;"
                                                             xml:space="preserve">
              <path class="u-fill-primary" opacity=".6" d="M0,58.9c0-0.9,5.1-2,5.8-2.2c6-0.8,11.8,2.2,17.2,4.6c4.5,2.1,8.6,5.3,13.3,7.1C48.2,73.3,61,73.8,73,69
                c43-16.9,40-7.9,84-2.2c44,5.7,83-31.5,143-10.1v69.8H0C0,126.5,0,59,0,58.9z"/>
                                                            <path class="u-fill-primary" d="M300,68.5v58H0v-58c0,0,43-16.7,82,5.6c12.4,7.1,26.5,9.6,40.2,5.9c7.5-2.1,14.5-6.1,20.9-11
                c6.2-4.7,12-10.4,18.8-13.8c7.3-3.8,15.6-5.2,23.6-5.2c16.1,0.1,30.7,8.2,45,16.1c13.4,7.4,28.1,12.2,43.3,11.2
                C282.5,76.7,292.7,74.4,300,68.5z"/>
                                                            <circle class="u-fill-danger" cx="259.5" cy="17" r="13"/>
                                                            <circle class="u-fill-primary" cx="290" cy="35.5" r="8.5"/>
                                                            <circle class="u-fill-success" cx="288" cy="5.5" r="5.5"/>
                                                            <circle class="u-fill-warning" cx="232.5" cy="34" r="2"/>
            </svg>
                                                    </div>
                                                    <!-- End SVG Background Shape -->
                                                </footer>
                                                <!-- End Footer -->
                                            </div>
                                        </div>
                                    </aside>
                            @endauth
                            <!-- End Account Sidebar Navigation -->
                            </ul>
                        </li>
                        <!-- End Button -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
        </div>
    </div>
</header>