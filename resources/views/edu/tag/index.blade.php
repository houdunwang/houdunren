@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body pb-0">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a href="{{route('edu.tag.index')}}"
                       class="nav-link {{active_class(if_route('edu.tag.index'))}}">
                        标签列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.tag.create')}}"
                       class="nav-link {{active_class(if_route('edu.tag.create'))}}">
                        新增标签
                    </a>
                </li>
            </ul>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">标签</th>
                        <th scope="col">更新时间</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td scope="row">{{$tag['id']}}</td>
                            <td>{{$tag['name']}}</td>
                            <td>{{$tag['updated_at']->format('Y/m/d')}}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-secondary" href="{{route('edu.tag.edit',$tag)}}">编辑</a>
                                    <a class="btn btn-secondary" onclick="del('{{$tag['id']}}')">删除</a>
                                    <form action="{{route('edu.tag.destroy',$tag)}}" method="post" id="tag{{$tag['id']}}">
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
                hdjs.confirm('确定删除标签吗？', function () {
                    $("#tag" + id).submit();
                })
            })
        }
    </script>
@endpush
