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
                        <a href="{{route('chat.button.index')}}" class="nav-link mr-3 active">
                            微信菜单列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('chat.button.create')}}" class="nav-link mr-3">
                            添加微信菜单
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
                            <th scope="col">菜单描述</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buttons as $button)
                            <tr>
                                <td>{{$button['id']}}</td>
                                <td>{{$button['title']}}</td>
                                <td>{{$button['created_at']->format('Y-m-d')}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="{{route('chat.button.edit',$button)}}">编辑</a>
                                        <a class="btn btn-secondary" href="{{route('chat.button.push',$button)}}">推送到微信</a>
                                        <button type="button" class="btn btn-danger" onclick="del(this)">删除记录</button>
                                        <form action="{{route('chat.button.destroy',$button)}}" method="post">
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
@push('js')
    <script>
        function del(button) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush
