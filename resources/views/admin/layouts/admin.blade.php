@extends('layouts.admin')
@section('menu')
    <ul class="navbar-nav">
        @if(auth()->user()->hasAnyPermission(['Admin-config','Admin-role','Admin-permission']))
            <li class="nav-item" menu="admin">
                <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-settings"></i> <strong>系统设置</strong>
                </a>
                <div class="collapse show" id="admin">
                    <ul class="nav nav-sm flex-column">
                        @can('Admin-config')
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'base'])}}" class="nav-link ">
                                    系统配置
                                </a>
                            </li>
                        @endcan
                        @can('Admin-permission')
                            <li class="nav-item">
                                <a href="{{route('admin.permission')}}" class="nav-link">
                                    系统权限列表
                                </a>
                            </li>
                        @endcan
                        @can('Admin-role')
                            <li class="nav-item">
                                <a href="{{route('admin.role.index')}}" class="nav-link">
                                    角色管理
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif

        @if(auth()->user()->hasAnyPermission(['Admin-user']))
            <li class="nav-item" menu="role">
                <a class="nav-link" href="#role" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-user"></i> <strong>网站会员管理</strong>
                </a>
                <div class="collapse show" id="role">
                    <ul class="nav nav-sm flex-column">
                        @can('Admin-user')
                            <li class="nav-item">
                                <a href="{{route('admin.user.index')}}" class="nav-link">
                                    会员列表
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['Admin-module','Admin-module-design']))
            <li class="nav-item" menu="module">
                <a class="nav-link" href="#module" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                    <i class="fe fe-grid"></i> <strong>模块管理</strong>
                </a>
                <div class="collapse show" id="module">
                    <ul class="nav nav-sm flex-column">
                        @can('Admin-module')
                            <li class="nav-item">
                                <a href="{{route('admin.module.index')}}" class="nav-link">
                                    模块列表
                                </a>
                            </li>
                        @endcan
                        @can('Admin-module-design')
                            <li class="nav-item">
                                <a href="{{route('admin.module.create')}}" class="nav-link">
                                    设计模块
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
    </ul>
@endsection
@section('content')
    @yield('content')
@endsection