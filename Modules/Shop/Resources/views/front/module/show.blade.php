@extends('shop::layouts.master')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-9">
                <div class="card shadow-sm">
                    <div class="card-header">
                        模块简介
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <img src="{{asset($module['thumb'])}}" class="w-100 h-100">
                            </div>
                            <div class="col-sm-6 col-12">
                                <h5 class="text-muted border-bottom pb-3 mb-3 mt-3 mt-sm-0">
                                    {{$module['title']}}
                                </h5>
                                <div class="font-weight-light mb-2">
                                    模块售价: {{$module['price']??0}} 元
                                </div>
                                <div class="font-weight-light mb-2">
                                    上传时间: {{$module['created_at']->format('Y-m-d')}}
                                </div>
                                <div class="font-weight-light mb-2">
                                    最近更新: {{$module['updated_at']->format('Y-m-d')}}
                                </div>
                                <div class="font-weight-light mb-2">
                                    模块类型:
                                    @if ($module['local'])
                                        <span class="badge badge-warning"> 系统内置</span>
                                    @else
                                        <span class="badge badge-info"> 在线安装 </span>
                                    @endif
                                </div>
                                <div class="border-top mt-3 pt-3">
                                    @if ($module->users->contains(auth()->user()))
                                        <button disabled type="button" class="btn btn-outline-success">
                                            <i class="fa fa-info-circle"></i> 已购买请登录后台安装模块
                                        </button>
                                    @else
                                        <a href="{{module_link('shop.front.buy.module',$module)}}"
                                           class="btn btn-success">安装模块</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm content border-top-0">
                    <div class="card-header">
                        详细介绍
                    </div>
                    <div class="card-body">
                        @if ($module['content'])
                            {!! $module['content']  !!}
                        @else
                            <span class="text-secondary">暂无介绍</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-3 mt-sm-0">
                <div class="card">
                    <div class="card-header">模块作者</div>
                    <div class="card-body p-0">
                        @include('components.user',['user'=>$module->author])
                    </div>
                </div>
                @if ($module['logList'])
                    <div class="card border-top-0">
                        <div class="card-header">
                            更新日志
                        </div>
                        <div class="card-body text-secondary">
                            @foreach ($module['logList'] as $log)
                                {{$log}} <br>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5 content">
        <div class="row">
            <div class="col-9">

            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
        require(['bootstrap'], function () {
            $(function () {
                $('[data-toggle="popover"]').popover({
                    trigger: 'hover'
                })
            });
        })
    </script>
@endpush