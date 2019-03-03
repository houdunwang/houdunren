@extends('layouts.member')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('shop.member.module.index'),'active')}}"
               href="{{module_link('shop.member.module.index')}}">模块列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active"
               href="#">
                压缩包列表
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{module_link('shop.member.module.create')}}">
                添加压缩包
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">
            <span class="badge badge-primary"> {{$module['title']}}</span> 压缩包列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>文件</th>
                    <th>上传时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($module->packages as $package)
                    <tr>
                        <td>{{$package['id']}}</td>
                        <td>
                            <a href="{{$package['path']}}">
                                {{$package['path']}}
                            </a>
                        </td>
                        <td>{{$package['created_at']->format('Y-m-d H:i')}}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success" href="{{$package['path']}}">
                                    下载压缩包
                                </a>
                                <form action="{{module_link('shop.member.package.destroy',$package)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
                                    删除压缩包
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop