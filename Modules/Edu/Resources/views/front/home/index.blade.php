@extends('edu::layouts.front')
@section('title')

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
            @include('edu::layouts.front.topic',$topic)
            @endforeach

            @foreach ($activities as $activity)
            @if ($activity->subject && $activity->subject_type)
            @php
            $info = explode('\\',$activity->subject_type)
            @endphp
            @include('edu::layouts.front.activity.'.strtolower(array_pop($info)))
            @endif

            @endforeach
            <div class="pt-3">
              @include('edu::layouts.front.paginate',['data'=>$activities])
            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-sm-3 mt-2">
        @include('edu::components.tip')
        @include('edu::components.learn')
      </div>
    </div>
  </div>
</div>

@endsection
