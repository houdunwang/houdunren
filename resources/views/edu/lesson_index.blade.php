@extends('edu.layouts.member')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('edu.layouts._lesson_menu')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">课程</th>
                        <th scope="col">更新时间</th>
                        <th>课程数</th>
                        <th scope="col">推荐</th>
                        <th scope="col">热门</th>
                        <th scope="col" width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td scope="row">{{$lesson['id']}}</td>
                            <td>{{$lesson['title']}}</td>
                            <td>{{$lesson['updated_at']}}</td>
                            <td>{{$lesson->video()->count()}}</td>
                            <td>{{$lesson['is_commend']?'是':'否'}}</td>
                            <td>{{$lesson['is_hot']?'是':'否'}}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-white" href="{{route('edu.lesson.edit',$lesson)}}">编辑</a>
                                    <a class="btn btn-white" onclick="del('{{$lesson['id']}}')">删除</a>
                                    <form action="{{route('edu.lesson.destroy',$lesson)}}" method="post" id="lesson{{$lesson['id']}}">
                                        @csrf @method('DELETE')
                                    </form>
                                    <a class="btn btn-white" href="{{route('edu.lesson.show',$lesson)}}">查看</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$lessons->links()}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除课程吗？', function () {
                    $("#lesson"+id).submit();
                })
            })
        }
    </script>
@endpush
