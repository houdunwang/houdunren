<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','hdcms')</title>
    <meta name="author" content="Jolly@向军大叔"/>
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keywords')"/>
    {{--<link rel="stylesheet" href="{{mix('css/app.css')}}">--}}
    <link rel="stylesheet" type="text/css"
          href="{{asset('org/beagle/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('org/beagle/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('org/beagle/css/app.css')}}" type="text/css"/>
    @yield('head')
</head>
<body>
<div class="be-wrapper be-fixed-sidebar" id="app">
    <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
            <div class="be-navbar-header">
                <a href="#" class="navbar-brand">
                </a>
            </div>
            <div class="be-right-navbar" style="width: auto;order:2;">
                <ul class="nav navbar-nav float-right be-user-nav">
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                           class="nav-link dropdown-toggle">
                            <img src="{{asset('org/beagle/img/avatar.png')}}" alt="Avatar">
                            <span class="user-name">Túpac Amaru</span>
                        </a>
                        <div role="menu" class="dropdown-menu">
                            <div class="user-info">
                                <div class="user-name">{{auth()->user()->nickname}}</div>
                                <div class="user-position online">
                                    {{auth()->user()->email}}
                                </div>
                            </div>
                            <a href="pages-profile.html" class="dropdown-item">
                                <span class="icon mdi mdi-face"></span> 修改密码
                            </a>
                            <a href="#" class="dropdown-item">
                                <span class="icon mdi mdi-settings"></span> 帐号设置
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout').submit()">
                                <span class="icon mdi mdi-power"></span> 退出
                            </a>
                            <form action="{{route('logout')}}" method="post" id="logout">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right be-icons-nav">
                    <li class="nav-item dropdown"><a href="#" role="button" aria-expanded="false"
                                                     class="nav-link be-toggle-right-sidebar"><span
                                    class="icon mdi mdi-settings"></span></a></li>
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                     class="nav-link dropdown-toggle"><span
                                    class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                        <ul class="dropdown-menu be-notifications">
                            <li>
                                <div class="title">通知<span class="badge badge-pill">3</span></div>
                                <div class="list">
                                    <div class="be-scroller ps-container ps-theme-default"
                                         data-ps-id="2fbbee5c-7339-076c-32de-44f1d3d44107">
                                        <div class="content">
                                            <ul>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img
                                                                    src="{{asset('org/beagle/img/avatar4.png')}}"
                                                                    alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">John Doe</span> is
                                                                watching your main repository
                                                            </div>
                                                            <span class="date">2 days ago</span>
                                                        </div>
                                                    </a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img
                                                                    src="{{asset('org/beagle/img/avatar5.png')}}"
                                                                    alt="Avatar"></div>
                                                        <div class="notification-info"><span class="text"><span
                                                                        class="user-name">Emily Carter</span> is now following you</span><span
                                                                    class="date">5 days ago</span></div>
                                                    </a></li>
                                            </ul>
                                        </div>
                                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                            <div class="ps-scrollbar-x" tabindex="0"
                                                 style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                                            <div class="ps-scrollbar-y" tabindex="0"
                                                 style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"><a href="#">查看所有通知</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                     class="nav-link dropdown-toggle"><span
                                    class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/github.png')}}"
                                                            alt="Github"><span>GitHub</span></a></div>
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/bitbucket.png')}}"
                                                            alt="Bitbucket"><span>Bitbucket</span></a></div>
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/slack.png')}}"
                                                            alt="Slack"><span>Slack</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/dribbble.png')}}"
                                                            alt="Dribbble"><span>Dribbble</span></a></div>
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/mail_chimp.png')}}"
                                                            alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                            <div class="col"><a href="#" class="connection-item"><img
                                                            src="{{asset('org/beagle/img/dropbox.png')}}" alt="Dropbox"><span>Dropbox</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"><a href="#">More</a></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="#" id="sub-navigation" data-toggle="collapse" aria-expanded="false"
               data-target="#be-navbar-collapse" class="be-toggle-top-header-menu collapsed">No Sidebar Left</a>
            <div id="be-navbar-collapse" class="navbar-collapse collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.html" class="nav-link">系统模块</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                           class="nav-link dropdown-toggle">
                            扩展插件 <span class="mdi mdi-caret-down"></span>
                        </a>
                        <div role="menu" class="dropdown-menu">
                            <a href="form-elements.html" class="dropdown-item">Elements</a>
                            <a href="form-validation.html" class="dropdown-item">Validation</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Fixed Sidebar</a>
            <div class="left-sidebar-spacer">
                @include('layouts._menus')
            </div>
            <div class="progress-widget">
                <div class="progress-data">
                    <span class="name">
                      系统由  <a href="http://www.hdcms.com" target="_blank">HDCMS</a> 提供技术支持
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="be-content">
        <div class="main-content container-fluid">
            @yield('content')
        </div>
    </div>
    <nav class="be-right-sidebar">
        <div class="sb-content">
            <div class="tab-navigation">
                <ul role="tablist" class="nav nav-tabs nav-justified">
                    <li role="presentation" class="nav-item">
                        <a href="#tab1" aria-controls="tab1" role="tab"
                           data-toggle="tab" class="nav-link active">站点</a>
                    </li>
                    <li role="presentation" class="nav-item">
                        <a href="#tab2" aria-controls="tab2" role="tab"
                           data-toggle="tab" class="nav-link">菜单</a></li>
                </ul>
            </div>
            <div class="tab-panel">
                <div class="tab-content">
                    <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                        <div class="chat-contacts">
                            <div class="chat-sections">
                                <div class="be-scroller">
                                    <div class="content">
                                        <h2 class="text-secondary">常用站点列表</h2>
                                        <div class="contact-list contact-list-recent">
                                            <div class="user">
                                                <a href="#">
                                                    <img
                                                            src="{{asset('org/beagle/img/avatar1.png')}}" alt="Avatar">
                                                    <div class="user-data"><span class="status away"></span><span
                                                                class="name">Claire Sassu</span><span class="message">Can you share the...</span>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                {{--<input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>--}}
                            </div>
                        </div>
                        <div class="chat-window">
                            <div class="title">
                                <div class="user"><img src="{{asset('org/beagle/img/avatar2.png')}}" alt="Avatar">
                                    <h2>Maggie jackson</h2><span>Active 1h ago</span>
                                </div>
                                <span class="icon return mdi mdi-chevron-left"></span>
                            </div>
                            <div class="chat-messages">
                                <div class="be-scroller">
                                    <div class="content">
                                        <ul>
                                            <li class="friend">
                                                <div class="msg">Hello</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Hi, how are you?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">Good, I'll need support with my pc</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Sure, just tell me what is going on with your
                                                    computer?
                                                </div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">I don't know it just turns off suddenly</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                    <input type="text" placeholder="Message..." name="q" autocomplete="off"><span
                                            class="send-msg mdi mdi-mail-send"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                        <div class="todo-container">
                            <div class="todo-wrapper">
                                <div class="be-scroller">
                                    <div class="todo-content"><span class="category-title">Today</span>
                                        <ul class="todo-list">
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" checked="" class="custom-control-input"><span
                                                            class="custom-control-label">Initialize the project</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            class="custom-control-label">Create the main structure							</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            class="custom-control-label">Updates changes to GitHub							</span>
                                                </label>
                                            </li>
                                        </ul>
                                        <span class="category-title">Tomorrow</span>
                                        <ul class="todo-list">
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            class="custom-control-label">Initialize the project							</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            class="custom-control-label">Create the main structure							</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            class="custom-control-label">Updates changes to GitHub							</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span
                                                            class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span
                                                            title="This task is too long to be displayed in a normal space!"
                                                            class="custom-control-label">This task is too long to be displayed in a normal space!							</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Create new task..." name="q"><span
                                        class="mdi mdi-plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
{{--<script src="{{asset('org/beagle/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>--}}
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('org/beagle/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('org/beagle/js/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
    });
</script>
</body>
</html>