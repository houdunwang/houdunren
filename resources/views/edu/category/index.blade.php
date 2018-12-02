@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('edu.category.index')}}">分类列表</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('edu.category.create')}}">添加分类</a>
                </li>
            </ul>
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
                        <tr>
                            <td scope="row">{{$category['id']}}</td>
                            <td>
                                {{$category['title']}}
                            </td>
                            <td><i class="{{$category['icon']}}" aria-hidden="true"></i></td>
                            <td>
                                {{$category['updated_at']}}
                            </td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-secondary" href="{{route('edu.category.edit',$category)}}">编辑</a>
                                    <a class="btn btn-secondary" href="javascript:void(0)"
                                       onclick="del({{$category['id']}})">删除</a>
                                    <form action="{{route('edu.category.destroy',$category)}}" method="post"
                                          id="{{$category['id']}}">
                                        @csrf @method('DELETE')
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
