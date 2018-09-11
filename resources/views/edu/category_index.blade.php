@extends('layouts.admin');
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#!">分类列表</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('edu.category.create')}}">添加分类</a>
                </li>
            </ul>
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">编号</th>
                            <th scope="col">分类名称</th>
                            <th scope="col">图标</th>
                            <th scope="col">更新时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="text-muted">
                                <td scope="row">{{$category['id']}}</td>
                                <td><small>{{$category['title']}}</small></td>
                                <td><i class="{{$category['icon']}}" aria-hidden="true"></i></td>
                                <td>
                                    <small>{{$category['updated_at']}}</small>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                        <a class="btn btn-white" href="{{route('edu.category.edit',$category)}}">编辑</a>
                                        <a class="btn btn-white" href="javascript:void(0)" onclick="del({{$category['id']}})">删除</a>
                                        <form action="{{route('edu.category.destroy',$category)}}" method="post" id="{{$category['id']}}">
                                            @csrf @method('DELETE')
                                            <input type="hidden" name="_token" value="qpeZtgN6fp7xVtX7pJemQ2MyS18snGllSGWFuR6H"> <input type="hidden" name="_method" value="DELETE"></form>
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
        function del(id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗？', function () {
                    $("#" + id).submit();
                })
            })
        }
    </script>
@endpush
