@extends('layouts.system')
@section('content')
    @include('system.module._tabs')
    <div class="card">
        <div class="card-header">
            已购模块列表
        </div>
        <div class="card-body">
            @if (count($modules['data'])>0)
                @foreach($modules['data'] as $module)
                    @if (true)
                        <div class="row">
                            <div class="col-xs-4 col-md-1 text-dark">
                                <img src="{{$module['thumb']}}" class="img-thumbnail">
                            </div>
                            <div class="col-xs-4 col-md-5 text-dark">
                                <strong class="title text-dark d-block">
                                    {{$module['title']}}
                                </strong>
                                <small class="text-secondary">
                                    标识：{{$module['name']}}
                                </small>
                            </div>
                            <div class="col-xs-4 col-md-6 text-right mt-3">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    @if ($module['local'])
                                        <button class="btn btn-outline-secondary" disabled="">
                                            已存在同名本地模块
                                        </button>
                                    @endif
                                    @if (!$module['installed'] && !$module['local'])
                                        <a class="btn btn-success"
                                           href="{{route('update.module.show',['name'=>$module['name']])}}">
                                            下载安装
                                        </a>
                                    @endif
                                    @if ($module['has_update'] && !$module['local'])
                                        <a class="btn btn-outline-danger"
                                           href="{{route('update.module.update',['name'=>$module['name']])}}">
                                            更新模块
                                        </a>
                                    @endif
                                    <a class="btn btn-outline-info" target="_blank"
                                       href="{{$cloud['host']??''}}/shop/front/module/{{$module['id']}}">
                                        访问模块页面
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
            @else
                <div class="alert alert-light d-block text-center" role="alert">
                    <strong class="text-secondary">
                        <i class="fa fa-info-circle"></i> 您没有购买任何模块，
                        访问 <a href="http://www.hdcms.com" class="text-primary">应用商店</a>获取模块
                    </strong>
                </div>
            @endif
        </div>
    </div>
@endsection