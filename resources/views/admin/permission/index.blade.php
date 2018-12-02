@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link mr-3 active">权限列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.permission.update.cache')}}" class="nav-link mr-3">更新权限缓存</a>
                </li>
            </ul>
            @foreach($modules as $module)
                @if($module['permission'])
                    <div class="card mb-3">
                        <div class="card-header">{{$module['title']}}</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($module['permission'] as $permission)
                                    <div class="col-3 ">
                                        <div class="pb-3">
                                            <strong>{{$permission['title']}}</strong>
                                            <span class="text-secondary">| {{$module['name']}}
                                                    -{{$permission['name']}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection