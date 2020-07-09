@extends('layouts.module')

@section('content')

@include('edu::lesson.nav')

<div class="table-responsive">
    <table class="table table-bordered mt-3 ">
        <thead>
            <tr>
                <th width="80">编号</th>
                <th>课程名称</th>
                <th>视频数量</th>
                <th>浏览量</th>
                <th>点赞数</th>
                <th>收藏数</th>
                <th>评论数</th>
                <th>售价</th>
                <th width="120"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $lesson)
            <tr>
                <td>{{ $lesson['id'] }}</td>
                <td>
                    <a href="" class="text-secondary">{{ $lesson['title'] }}</a>
                </td>
                <td>{{ $lesson['video_num'] }}</td>
                <td>{{ $lesson['read_num'] }}</td>
                <td>{{ $lesson['favour_count'] }}</td>
                <td>{{ $lesson['favorite_count'] }}</td>
                <td>{{ $lesson['comment_num'] }}</td>
                <td>{{ $lesson['price'] }}</td>
                <td class="text-right">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('Edu.admin.lesson.edit',$lesson['id']) }}" class="btn btn-info">编辑</a>
                        <btn-del action="{{ route('Edu.admin.lesson.destroy',$lesson['id']) }}"></btn-del>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $lessons->links() }}
@endsection
