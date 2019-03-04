@extends('layouts.member')
@section('content')
    @include('shop::member.module._tab')
    <div class="card">
        <div class="card-header">
            模块列表
        </div>
        <div class="card-body">
            @foreach ($modules as $module)
                <div class="row">
                    <div class="col-xs-4 col-md-2 text-dark">
                        <img src="{{$module['thumb']}}" class="img-thumbnail">
                    </div>
                    <div class="col-xs-4 col-md-5 text-dark">
                        <strong class="title text-dark d-block">
                            {{$module['title']}}
                        </strong>
                        <small class="text-secondary">
                            模块标识：{{$module['name']}}
                        </small>
                        <small class="text-secondary d-block">
                            更新时间：{{$module['updated_at']}}
                        </small>
                        <small class="text-secondary d-block">
                            状态：
                            @if ($module['status'])
                                <small class="text-success">上线</small>
                            @else
                                <small class="text-secondary">审核中</small>
                            @endif
                        </small>
                    </div>
                    <div class="col-xs-4 col-md-5 text-right mt-3">
                        <div class="btn-group btn-group-sm mt-3" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{module_link('shop.member.module.edit',$module)}}">
                                编辑模块
                            </a>
                            <a class="btn btn-outline-info" href="{{module_link('shop.member.package.index',['id'=>$module])}}">压缩包列表</a>
                            <form action="{{module_link('shop.member.module.destroy',$module)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
                                删除模块
                            </button>
                            <a class="btn btn-outline-secondary" href="{{module_link('shop.member.module.create')}}">
                                发布新版本
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    <div>
        {{$modules->links()}}
    </div>
@endsection