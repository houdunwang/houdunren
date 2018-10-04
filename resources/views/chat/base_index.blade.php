@extends('layouts.admin')
@section('menu')
    @include('chat.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('chat.base.index')}}" class="nav-link mr-3 active">
                            普通文本消息
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('chat.base.create')}}" class="nav-link mr-3">
                            添加文本消息
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-sm">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">回复内容</th>
                            <th scope="col">关键词</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bases as $base)
                            <tr>
                                <td>{{$base['id']}}</td>
                                <td>{{$base['content']}}</td>
                                <td>{{$base['content']}}</td>
                                <td>{{$module['created_at']->diffForHumans()}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-danger" onclick="del(this)">删除记录</button>
                                        <form action="{{route('admin.module.destroy',$module)}}" method="post">
                                            @method('DELETE') @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
