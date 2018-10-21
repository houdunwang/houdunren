
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Default Header | Front - Responsive Website Template</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('org/front/vendor')}}/bootstrap/css/bootstrap.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('org/front/vendor')}}/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('org/front/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('org/front/vendor')}}/hs-megamenu/src/hs.megamenu.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('org/front/css/front.css')}}">
</head>

<body>
<!-- Skippy -->
<a id="skippy" class="sr-only sr-only-focusable u-skippy" href="#content">
    <div class="container">
        <span class="u-skiplink-text">Skip to main content</span>
    </div>
</a>
<!-- End Skippy -->

<!-- ========== HEADER ========== -->
<header id="header" class="u-header">
    <div class="u-header__section">
        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand" href="../../html/home/index.html" aria-label="Front">
                    <img src="{{asset('org/front/svg/logos/logo.svg')}}" alt="Logo">
                </a>
                <!-- End Logo -->

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
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse py-0">
                    <ul class="navbar-nav u-header__navbar-nav ml-lg-auto">
                        <!-- Home -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link pl-0" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false">
                                Home
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>

                            <!-- Home - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu w-100 u-header__mega-menu-wrapper-v2" aria-labelledby="homeMegaMenu">
                                <div class="row p-0 mr-0">
                                    <div class="col-lg-6 pr-0">
                                        <!-- Banner Image -->
                                        <div class="d-none d-lg-block u-header__banner-v1" data-bg-img-src="../../assets/img/750x750/img1.jpg">
                                            <div class="w-100 text-center u-header__banner-v1-content u-content-centered-y p-4">
                                                <div class="mb-4">
                                                    <strong class="d-block u-header__banner-v1-title mb-2">Branding Works</strong>
                                                    <span class="u-header__banner-v1-text">Experience a level of our quality in both design &amp; customization works.</span>
                                                </div>
                                                <a class="btn btn-primary u-btn-primary btn-sm transition-3d-hover" href="#">Learn More <span class="fa fa-angle-right ml-2"></span></a>
                                            </div>
                                        </div>
                                        <!-- End Banner Image -->
                                    </div>

                                    <div class="col-lg-6 u-header__mega-menu-wrapper-v3">
                                        <div class="row u-header__mega-menu-wrapper-v1">
                                            <div class="col-sm-6">
                                                <strong class="d-block mb-2">Classic</strong>

                                                <!-- Links -->
                                                <ul class="list-unstyled mb-4">
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/index.html">Classic Agency</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/classic-crypto.html">Classic Crypto</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/classic-business.html">Classic Business</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/classic-marketing.html">Classic Marketing</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/classic-consulting.html">Classic Consulting</a></li>
                                                </ul>
                                                <!-- End Links -->

                                                <strong class="d-block mb-2">Corporate</strong>

                                                <!-- Links -->
                                                <ul class="list-unstyled mb-4">
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/corporate-agency.html">Corporate Agency</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/corporate-start-up.html">Corporate Start-Up</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/corporate-business.html">Corporate Business <span class="badge badge-success ml-1">New</span></a></li>
                                                </ul>
                                                <!-- End Links -->
                                            </div>

                                            <div class="col-sm-6">
                                                <strong class="d-block mb-2">Landing</strong>

                                                <!-- Links -->
                                                <ul class="list-unstyled mb-4">
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/landing-house.html">Landing House <span class="badge badge-success ml-1">New</span></a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/landing-job.html">Landing Job <span class="badge badge-success ml-1">New</span></a></li>
                                                </ul>
                                                <!-- End Links -->

                                                <strong class="d-block mb-2">Blog</strong>

                                                <!-- Links -->
                                                <ul class="list-unstyled mb-4">
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/blog-agency.html">Blog Agency</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/blog-start-up.html">Blog Start-Up</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/blog-business.html">Blog Business</a></li>
                                                </ul>
                                                <!-- End Links -->

                                                <strong class="d-block mb-2">Portfolio</strong>

                                                <!-- Links -->
                                                <ul class="list-unstyled u-list">
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/portfolio-agency.html">Portfolio Agency</a></li>
                                                    <li><a class="nav-link u-list__link py-2 px-0" href="../../html/home/portfolio-profile.html">Portfolio Profile</a></li>
                                                </ul>
                                                <!-- End Links -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Home - Mega Menu -->
                        </li>
                        <!-- End Home -->

                        <!-- Pages -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut">
                            <a id="pagesMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false"
                               aria-labelledby="pagesSubMenu">
                                Pages
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>

                            <!-- Pages - Submenu -->
                            <ul id="pagesSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0" style="min-width: 220px;"
                                aria-labelledby="pagesMegaMenu">
                                <!-- Account -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesAccount" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesAccount">
                                        Account
                                        <span class="badge badge-success ml-1">New</span>
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesAccount" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesAccount">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/profile.html">Profile</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/my-tasks.html">My tasks</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/projects.html">Projects</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/members.html">Members</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/edit-profile.html">Edit profile</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/change-password.html">Change password</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/notifications.html">Notifications</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/activity.html">Activity</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/payment-methods.html">Payment methods</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/invite-friends.html">Invite friends</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/plans.html">Plans</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/account/api-token.html">API Token</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- End Account -->

                                <!-- About -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesAbout" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesAbout">
                                        About
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesAbout" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesAbout">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/about-agency.html">About Agency</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/about-start-up.html">About Start-Up</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- About -->

                                <!-- Services -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesServices" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesServices">
                                        Services
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesServices" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesServices">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/services-agency.html">Services Agency</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/services-start-up.html">Services Start-Up</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Services -->

                                <!-- Careers -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesCareers" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesCareers">
                                        Careers
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesCareers" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesCareers">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/careers.html">Careers</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/careers-single.html">Careers Single</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/hire-us.html">Hire Us</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Careers -->

                                <!-- Login -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesLogin" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesLogin">
                                        Login &amp; Signup
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesLogin" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesLogin">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/login-simple.html">Login Simple</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/signup-simple.html">Signup Simple</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/recover-account.html">Recover Account</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Signup -->

                                <!-- Contacts -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkContactsServices" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuContactsServices">
                                        Contacts
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuContactsServices" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkContactsServices">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/contacts-agency.html">Contacts Agency</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/contacts-start-up.html">Contacts Start-Up</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Contacts -->

                                <!-- Utilities -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesUtilities" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesUtilities">
                                        Utilities
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesUtilities" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesUtilities">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/help.html">Help</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/pricing.html">Pricing</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/terms.html">Terms &amp; Conditions</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/privacy.html">Privacy &amp; Policy</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Utilities -->

                                <!-- Specialty -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkPagesSpecialty" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuPagesSpecialty">
                                        Specialty
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuPagesSpecialty" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkPagesSpecialty">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/cover-page.html">Cover Page</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/coming-soon.html">Coming Soon</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/maintenance-mode.html">Maintenance Mode</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/pages/error-404.html">Error 404</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Specialty -->
                            </ul>
                            <!-- End Pages - Submenu -->
                        </li>
                        <!-- End Pages -->

                        <!-- Works -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="right">
                            <a id="worksMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false">
                                Work
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>

                            <!-- Works - Mega Menu -->
                            <div class="hs-mega-menu w-100 u-header__sub-menu u-header__mega-menu-wrapper-v1" aria-labelledby="worksMegaMenu">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                        <strong class="d-block mb-2">Boxed Layouts</strong>

                                        <!-- Links -->
                                        <ul class="list-unstyled u-list">
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/boxed-classic.html">Portfolio Classic</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/boxed-grid.html">Portfolio Grid</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/boxed-masonry.html">Portfolio Masonry</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/boxed-modern.html">Portfolio Modern</a></li>
                                        </ul>
                                        <!-- End Links -->
                                    </div>

                                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                                        <strong class="d-block mb-2">Full Width Layouts</strong>

                                        <!-- Links -->
                                        <ul class="list-unstyled u-list">
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/fullwidth-classic.html">Portfolio Classic</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/fullwidth-grid.html">Portfolio Grid</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/fullwidth-masonry.html">Portfolio Masonry</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/fullwidth-modern.html">Portfolio Modern</a></li>
                                        </ul>
                                        <!-- End Links -->
                                    </div>

                                    <div class="col-sm-6 col-lg-3 mb-3 mb-sm-0">
                                        <strong class="d-block mb-2">Single Pages</strong>

                                        <!-- Links -->
                                        <ul class="list-unstyled u-list">
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/single-page-simple.html">Single Page Simple</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/single-page-grid.html">Single Page Grid</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/single-page-masonry.html">Single Page Masonry</a></li>
                                        </ul>
                                        <!-- End Links -->
                                    </div>

                                    <div class="col-sm-6 col-lg-3">
                                        <strong class="d-block mb-2">Case Studies</strong>

                                        <!-- Links -->
                                        <ul class="list-unstyled u-list">
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/case-studies-simple.html">Case Studies Simple</a></li>
                                            <li><a class="nav-link u-list__link py-2 px-0" href="../../html/portfolio/case-studies-modern.html">Case Studies Modern</a></li>
                                        </ul>
                                        <!-- End Links -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Works - Mega Menu -->
                        </li>
                        <!-- End Works -->

                        <!-- Blog -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut">
                            <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false"
                               aria-labelledby="blogSubMenu">
                                Blog
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>

                            <!-- Blog - Submenu -->
                            <ul id="blogSubMenu" class="list-inline hs-sub-menu u-header__sub-menu py-3 mb-0" style="min-width: 220px;"
                                aria-labelledby="blogMegaMenu">
                                <!-- Classic -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogClassic" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogClassic">
                                        Classic
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogClassic" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogClassic">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/classic-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/classic-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/classic-full-width.html">Full Width</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Classic -->

                                <!-- Grid -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogGrid" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogGrid">
                                        Grid
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogGrid" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogGrid">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/grid-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/grid-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/grid-full-width.html">Full Width</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Grid -->

                                <!-- List -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogList" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogList">
                                        List
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogList" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogList">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/list-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/list-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/list-full-width.html">Full Width</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- List -->

                                <!-- Modern -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogCard" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogCard">
                                        Modern
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogCard" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogCard">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/modern-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/modern-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/modern-full-width.html">Full Width</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Grid Modern -->

                                <!-- Masonry -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogGridMinimal" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogGridMinimal">
                                        Masonry
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogGridMinimal" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogGridMinimal">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/masonry-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/masonry-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/masonry-full-width.html">Full Width</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Masonry -->

                                <!-- Single Article -->
                                <li class="dropdown-item hs-has-sub-menu">
                                    <a id="navLinkBlogGridMasonry" class="nav-link u-header__sub-menu-nav-link u-list__link py-2" href="javascript:;"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="navSubmenuBlogGridMasonry">
                                        Single Article
                                        <span class="fa fa-angle-right u-header__sub-menu-nav-link-icon"></span>
                                    </a>

                                    <!-- Submenu (level 2) -->
                                    <ul id="navSubmenuBlogGridMasonry" class="hs-sub-menu list-unstyled u-header__sub-menu u-header__sub-menu-menu-gutter--y u-header__sub-menu-offset" style="min-width: 220px;"
                                        aria-labelledby="navLinkBlogGridMasonry">
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/single-article-classic.html">Classic</a>
                                        </li>
                                        <li class="dropdown-item px-0">
                                            <a class="nav-link u-list__link px-4" href="../../html/blog/single-article-simple.html">Simple</a>
                                        </li>
                                    </ul>
                                    <!-- End Submenu (level 2) -->
                                </li>
                                <!-- Single Article -->
                            </ul>
                            <!-- End Submenu -->
                        </li>
                        <!-- End Blog -->

                        <!-- Shop -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-max-width="440px"
                            data-position="right">
                            <a id="shopMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
                               aria-haspopup="true"
                               aria-expanded="false">
                                Shop
                                <span class="fa fa-angle-down u-header__nav-link-icon"></span>
                            </a>

                            <!-- Shop - Mega Menu -->
                            <div class="hs-mega-menu u-header__sub-menu" aria-labelledby="shopMegaMenu">
                                <div class="u-header__mega-menu-wrapper-v1">
                                    <strong class="d-block mb-2">Shop Elements</strong>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- Links -->
                                            <ul class="list-unstyled u-list">
                                                <li><a class="nav-link u-list__link py-2 px-0" href="../../html/shop/classic.html">Classic</a></li>
                                                <li><a class="nav-link u-list__link py-2 px-0" href="../../html/shop/masonry.html">Masonry</a></li>
                                                <li><a class="nav-link u-list__link py-2 px-0" href="../../html/shop/single-product.html">Single Product</a></li>
                                            </ul>
                                            <!-- End Links -->
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- Links -->
                                            <ul class="list-unstyled u-list">
                                                <li><a class="nav-link u-list__link py-2 px-0" href="../../html/shop/cart.html">Cart</a></li>
                                                <li><a class="nav-link u-list__link py-2 px-0" href="../../html/shop/checkout.html">Checkout</a></li>
                                            </ul>
                                            <!-- End Links -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Mega Menu Banner -->
                                <div class="d-none d-md-block u-header__banner-v2 pr-4">
                                    <div class="d-flex align-items-end">
                                        <img class="img-fluid mr-4" src="{{asset('org/front/img/mockups/img4.png')}}" alt="Image Description" style="width: 200px;">
                                        <div class="py-4">
                                            <div class="mb-4">
                                                <strong class="d-block u-header__banner-v2-title mb-2">Win T-shirt</strong>
                                                <span class="d-block u-header__banner-v2-text">Win one of our Front brand T-shirts.</span>
                                            </div>
                                            <a class="btn btn-sm u-btn-primary--air transition-3d-hover" href="../../html/shop/classic.html">Learn More <span class="fa fa-angle-right ml-2"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu Banner -->
                            </div>
                            <!-- End Shop - Mega Menu -->
                        </li>
                        <!-- End Shop -->

                        <!-- Starter - Link -->
                        <li class="nav-item">
                            <a class="nav-link u-header__nav-link" href="../index.html">
                                Starter
                            </a>
                        </li>
                        <!-- End Starter - Link -->

                        <!-- Button -->
                        <li class="nav-item d-none d-md-inline-block pl-3 pr-0">
                            <a class="btn btn-sm btn-primary u-btn-primary transition-3d-hover" href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/" target="_blank">
                                Buy Now
                            </a>
                        </li>
                        <!-- End Button -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Hero Section -->
    <div class="u-gradient-half-primary-v1">
        <div class="container text-center u-space-3">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 mx-auto mb-5">
                <span class="u-label u-label--sm u-label--white mb-2">Starter</span>
                <h1 class="h1 text-white">
                    <span class="font-weight-bold">Header default</span>
                </h1>
            </div>
            <!-- End Title -->

            <a class="btn text-primary u-btn-white u-btn-wide transition-3d-hover" href="../header-layouts.html">Header Layouts</a>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Content -->
    <div class="container u-space-5">
        <h2 class="h5">Content goes here...</h2>
        <p>We strive to embrace and drive change in our industry which allows us to keep our clients relevant and ready to adapt. As creatives, it's important that we strive to do work outside of obligation. This lets us stay ahead of the curve for our clients and internal projects. At the end of the day, it's important to not let being busy distract us from having fun. Smiling, laughing, and hanging helps us work together to achieve this.</p>
        <p>It's important to stay detail oriented with every project we tackle. Staying focused allows us to turn every project we complete into something we love. Working together on the daily requires each individual to let the greater good of the team's work surface above their own ego. We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation.</p>
        <p>This is where we sit down, grab a cup of coffee and dial in the details. Understanding the task at hand and ironing out the wrinkles is key. Now that we've aligned the details, it's time to get things mapped out and organized. This part is really crucial in keeping the project in line to completion. The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels.</p>
        <p>Whether through commerce or just an experience to tell your brand's story, the time has come to start using development languages that fit your projects needs. Now that your brand is all dressed up and ready to party, it's time to release it to the world. By the way, let's celebrate already.</p>
        <p>Understanding who you are and what you want is our strategy for your brand. We are always figuring out ways to capture your vision, so people can get on board. Whether it's branding, print, UI + UX we've got you covered. We strive to figure out the right solutions for your look to stand out amongst the rest.</p>
        <p>Whether it's branding, print, UI + UX we've got you covered. We strive to figure out the right solutions for your look to stand out amongst the rest. This a powerful outlet that constantly gets overlooked. We strive to figure out ways to help your audience grow through all social platforms. Finding ways to help tell your story through photography is a powerful tool to make your branded content stand out from the rest. Finding ways to help tell your story through video is a powerful tool to make your branded content stand out from the rest.</p>
        <p>Staying focused allows us to turn every project we complete into something we love. Working together on the daily requires each individual to let the greater good of the team's work surface above their own ego. We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation. It's important to stay detail oriented with every project we tackle.</p>
        <p>Now that your brand is all dressed up and ready to party, it's time to release it to the world. By the way, let's celebrate already. Whether through commerce or just an experience to tell your brand's story, the time has come to start using development languages that fit your projects needs.</p>
        <p>As creatives, it's important that we strive to do work outside of obligation. This lets us stay ahead of the curve for our clients and internal projects. At the end of the day, it's important to not let being busy distract us from having fun. Smiling, laughing, and hanging helps us work together to achieve this. We strive to embrace and drive change in our industry which allows us to keep our clients relevant and ready to adapt.</p>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fa fa-arrow-up u-go-to__inner"></span>
</a>

<h2>lllll</h2>
<a class="btn btn-xs u-btn--icon u-btn-text-secondary" href="javascript:;" role="button"
   aria-haspopup="true"
   aria-expanded="false"
   aria-controls="searchPushTop"
   data-unfold-type="jquery-slide"
   data-unfold-target="#searchPushTop">
    <span class="fa fa-search u-btn--icon__inner"></span>
</a>

<div id="searchPushTop" class="u-search-push-top">
    <div class="container position-relative">
        <div class="u-search-push-top__content mx-auto">
            <button type="button" class="close u-search-push-top__close-btn"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-controls="searchPushTop"
                    data-unfold-type="jquery-slide"
                    data-unfold-target="#searchPushTop">
                <span aria-hidden="true">×</span>
            </button>

            <form class="js-focus-state input-group input-group-lg u-form u-form--lg u-form--no-brd">
                <input type="search" class="form-control u-form__input" placeholder="Search Front" aria-label="Search Front">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary u-btn-primary">Search</button>
                </div>
            </form>

            <div class="row d-none d-md-flex mt-7">
                <div class="col-sm-6">
                    <strong class="d-block mb-2">Quick Links</strong>

                    <div class="row">
                        <ul class="col-sm-6 list-unstyled u-list">
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Search Results List
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Search Results Grid
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="../pages/about-agency.html">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    About
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="../pages/services-agency.html">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Services
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Invoice
                                </a>
                            </li>
                        </ul>

                        <ul class="col-sm-6 list-unstyled u-list">
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    User Contacts
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Reviews
                                </a>
                            </li>
                            <li>
                                <a class="u-list__link" href="#">
                                    <span class="fa fa-angle-right u-list__link-icon mr-1"></span>
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="rounded u-search-push-top__banner">
                        <div class="d-flex align-items-center">
                            <div class="u-search-push-top__banner-container">
                                <img class="img-fluid u-search-push-top__banner-img" src="../../assets/img/mockups/img3.png" alt="Image Description">
                                <img class="img-fluid u-search-push-top__banner-img" src="../../assets/img/mockups/img2.png" alt="Image Description">
                            </div>

                            <div>
                                <div class="mb-4">
                                    <strong class="d-block mb-2">Featured Item</strong>
                                    <p>Create astonishing web sites and pages.</p>
                                </div>
                                <a class="btn btn-xs u-btn-success--air transition-3d-hover" href="index.html">Apply Now <span class="fa fa-angle-right ml-2"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts._hdjs')
{{--<script src="{{asset('org/front/vendor')}}/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="{{asset('org/front/vendor')}}/jquery-migrate/dist/jquery-migrate.min.js"></script>--}}
{{--<script src="{{asset('org/front/vendor')}}/popper.js/dist/umd/popper.min.js"></script>--}}
{{--<script src="{{asset('org/front/vendor')}}/bootstrap/bootstrap.min.js"></script>--}}

{{--<script src="{{asset('org/front/vendor')}}/hs-megamenu/src/hs.megamenu.js"></script>--}}

{{--<script src="{{asset('org/front')}}/js/hs.core.js"></script>--}}
{{--<script src="{{asset('org/front')}}/js/components/hs.header.js"></script>--}}
{{--<script src="{{asset('org/front')}}/js/components/hs.unfold.js"></script>--}}
{{--<script src="{{asset('org/front')}}/js/components/hs.go-to.js"></script>--}}
<script>
    require(['jquery','jquery-migrate','popper','hs.megamenu','hs.core','hs.header','hs.unfold','hs.go-to'],function($){
        $(window).on('load', function () {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 767,
                hideTimeOut: 0
            });
        });
        $(document).on('ready', function () {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function () {
                    $(this).find('input[type="search"]').focus();
                }
            });
        });
    })
</script>
<script>
    // $(window).on('load', function () {
    //     // initialization of HSMegaMenu component
    //     $('.js-mega-menu').HSMegaMenu({
    //         event: 'hover',
    //         pageContainer: $('.container'),
    //         breakpoint: 767,
    //         hideTimeOut: 0
    //     });
    // });
    //
    // $(document).on('ready', function () {
    //     // initialization of header
    //     $.HSCore.components.HSHeader.init($('#header'));
    //
    //     // initialization of go to
    //     $.HSCore.components.HSGoTo.init('.js-go-to');
    // });
</script>

</body>
</html>