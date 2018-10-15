@extends('layouts.admin')
@section('menu')
    <ul class="navbar-nav">
        @if(auth()->user()->hasAnyPermission(['Edu-category','Edu-lesson']))
            <li class="nav-item" menu="edu">
                <a class="nav-link" href="#edu" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-video"></i> <strong>内容管理</strong>
                </a>
                <div class="collapse show" id="edu">
                    <ul class="nav nav-sm flex-column">
                        @can('Edu-category')
                            <li class="nav-item">
                                <a href="{{route('edu.category.index')}}" class="nav-link">
                                    帖子分类
                                </a>
                            </li>
                        @endcan
                        @can('Edu-lesson')
                            <li class="nav-item">
                                <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                                    课程管理
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(auth()->user()->hasAnyPermission(['Edu-order']))
            <li class="nav-item" menu="edu">
                <a class="nav-link" href="#edu" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fe fe-shopping-bag"></i> <strong>会员订单管理</strong>
                </a>
                <div class="collapse show" id="edu">
                    <ul class="nav nav-sm flex-column">
                        @can('Edu-order')
                            <li class="nav-item">
                                <a href="{{route('edu.lesson.index')}}" class="nav-link ">
                                    会员订单
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
