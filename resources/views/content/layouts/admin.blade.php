@extends('layouts.admin')
@section("menu")
    <ul class="navbar-nav">
        @if(auth()->user()->hasAnyPermission(['Content-config','Content-template']))
            <li class="nav-item">
                <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-layers"></i> <strong>配置设置</strong>
                </a>
                <div class="collapse show" id="admin">
                    <ul class="nav nav-sm flex-column">
                        @can('Content-config')
                            <li class="nav-item">
                                <a href="{{route('content.config.edit')}}" class="nav-link">
                                    模块配置
                                </a>
                            </li>
                        @endcan
                        @can('Content-template')
                            <li class="nav-item">
                                <a href="{{route('content.template.index')}}" class="nav-link">
                                    风格模板
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['Content-article','Content-category','Content-model','Content-slide']))
            <li class="nav-item" menu="admin">
                <a class="nav-link" href="#admin" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-file-text"></i> <strong>内容管理</strong>
                </a>
                <div class="collapse show" id="admin">
                    <ul class="nav nav-sm flex-column">
                        @can('Content-article')
                            <li class="nav-item">
                                <a href="{{route('content.article.index')}}" class="nav-link">
                                    文章管理
                                </a>
                            </li>
                        @endcan
                        @can('Content-category')
                            <li class="nav-item">
                                <a href="{{route('content.category.index')}}" class="nav-link">
                                    栏目分类
                                </a>
                            </li>
                        @endcan
                        @can('Content-model')
                            <li class="nav-item">
                                <a href="{{route('content.model.index')}}" class="nav-link">
                                    内容模型
                                </a>
                            </li>
                        @endcan
                        @can('Content-slide')
                            <li class="nav-item">
                                <a href="{{route('content.slide.index')}}" class="nav-link">
                                    幻灯片管理
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