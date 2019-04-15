@extends('layouts.system')
@section('content')
    @include('system.module._tabs')
    <div class="card">
        <div class="card-header">本地未安装模块</div>
        <div class="card-body">
            @if (count($modules)>0)
                @foreach($modules as $module)
                    <div class="row">
                        <div class="col-xs-4 col-md-1 text-dark">
                            <img src="{{asset('modules/'.strtolower($module['name']).'/thumb.jpeg')}}" class="img-thumbnail">
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
                                <a class="btn btn-outline-success"
                                   href="{{route('system.module.install',$module['name'])}}">
                                    安装模块
                                </a>
                                <a class="btn btn-outline-secondary"
                                   href="{{route('system.zip.module',['name'=>$module['name']])}}"
                                   data-container="body"
                                   data-toggle="popover"
                                   data-placement="top" data-content="打包下载提到应用商店出售">打包下载</a>
                                <form action="{{route('system.module.delete',['name'=>$module['name']])}}" method="post">
                                    @csrf
                                </form>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="destroy(this,'确定删除模块的所有文件与数据吗？')"
                                        data-container="body" data-toggle="popover" data-placement="top"
                                        data-content="将删除模块的所有数据与文件">
                                    删除模块所有文件
                                </button>

                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="alert alert-light d-block text-center" role="alert">
                    <strong class="text-secondary"> <i class="fa fa-info-circle"></i>
                        没有可安装的本地模块
                    </strong>
                </div>
            @endif

        </div>
    </div>
@endsection