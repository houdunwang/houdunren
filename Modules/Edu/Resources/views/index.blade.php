@extends('edu::layouts.front')
@section('title',site()['title'])

@section('content')
<div>
    <div class="container mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12 col-sm-9 mt-2">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        社区动态
                        <a href="{{ route('Edu.front.topic.create') }}" class="btn btn-outline-secondary btn-sm">发表</a>
                    </div>
                    <div class="card-body">
                        @foreach ($topics as $topic)
                        @include('edu::components.topic',$topic)
                        @endforeach
                        @foreach ($activities as $activity)
                        @if ($activity->subject)
                        @switch($activity->subject_type)
                        @case('Modules\Edu\Entities\Topic')
                        @include('edu::components.activity.topic',['topic'=>$activity->subject])
                        @break
                        @case('Modules\Edu\Entities\Sign')
                        @include('edu::components.activity.sign',['sign'=>$activity->subject])
                        @break
                        @case('Modules\Edu\Entities\Lesson')
                        @include('edu::components.activity.lesson',['lesson'=>$activity->subject])
                        @break
                        @case('Modules\Edu\Entities\Comment')
                        @include('edu::components.activity.comment',['comment'=>$activity->subject])
                        @break
                        @endswitch
                        @endif
                        @endforeach
                        <div class="pt-3">
                            {{$activities->links() }}
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 col-sm-3 mt-2 pl-0">
                @include('edu::components.tip')
                @include('edu::components.learn')
            </div>
        </div>
    </div>
</div>

@endsection
