@extends('edu.layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-sm">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('edu.category.index')}}">分类列表</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('edu.category.create')}}">添加分类</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive text-secondary">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">分类名称</th>
                        <th scope="col">图标</th>
                        <th scope="col">系统分类</th>
                        <th scope="col">更新时间</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="">
                            <td scope="row">{{$category['id']}}</td>
                            <td>
                                <small>{{$category['title']}}</small>
                            </td>
                            <td><i class="{{$category['icon']}}" aria-hidden="true"></i></td>
                            <td>
                                @if($category['system'])
                                    <span class="fe fe-check-circle text-info"></span>
                                @else
                                    <span class="fe fe-x-circle"></span>
                                @endif
                            </td>
                            <td>
                                <small>{{$category['updated_at']}}</small>
                            </td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-light" href="{{route('edu.category.edit',$category)}}">编辑</a>
                                    <a class="btn btn-white" href="javascript:void(0)"
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
