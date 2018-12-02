@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a href="{{route('edu.system.index')}}"
                       class="nav-link {{active_class(if_route('edu.system.index'))}}">
                        课程列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.system.create')}}"
                       class="nav-link {{active_class(if_route('edu.system.create'))}}">
                        新增课程
                    </a>
                </li>
            </ul>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">系统课程标题</th>
                        <th scope="col">更新时间</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td scope="row">{{$lesson['id']}}</td>
                            <td>
                                {{$lesson['title']}}
                            </td>
                            <td>{{$lesson['updated_at']->format('Y/m/d')}}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-secondary" href="{{route('edu.system.edit',$lesson)}}">编辑</a>
                                    <a class="btn btn-secondary" href="{{route('edu.system.show',$lesson)}}"
                                       target="_blank">查看</a>
                                    <a class="btn btn-secondary" onclick="del('{{$lesson['id']}}')">删除</a>
                                    <form action="{{route('edu.system.destroy',$lesson)}}" method="post"
                                          id="lesson{{$lesson['id']}}">
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
                hdjs.confirm('确定删除课程吗？', function () {
                    $("#lesson" + id).submit();
                })
            })
        }
    </script>
@endpush
