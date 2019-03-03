@extends('shop::layouts.master')
@section('content')
    <div class="container pt-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="text-secondary">模块插件</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($modules as $module)
                        <div class="col-sm-3 col-12">
                            <div class="card shadow h-100">
                                <img src="{{asset($module['thumb'])}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title pb-2">
                                        {{$module['title']}}
                                        <span class="badge badge-success" data-container="body" data-toggle="popover" data-placement="top" data-content="系统内置模块，不需要下载安装">内</span>
                                    </h5>
                                    <p class="card-text text-secondary">
                                        {{$module['description']}}
                                    </p>
                                </div>
                                <div class="card-header border-top">
                                    <div class="">
                                        <small class="text-muted float-left pt-1">
                                            更新: {{$module['updated_at']->format('Y-m-d')}}
                                        </small>
                                        <a href="{{module_link('shop.front.module.show',$module)}}" class="btn btn-outline-info btn-sm float-right">安装模块</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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