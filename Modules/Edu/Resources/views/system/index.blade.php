@extends('layouts.module')

@section('content')

@include('edu::system.nav')

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

        </tbody>
    </table>
</div>
@endsection
