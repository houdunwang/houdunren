@extends('edu::layouts.front')
@section('title','贴子列表')
@section('content')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-12 col-md-9 mb-3">
      <div class="card shadow-sm">
        <div class="card-header bg-white justify-content-between">话题讨论</div>
        <div class="card-body pb-0 pt-2">
          <form method="{{ route('Edu.front.topic.index') }}" method="post">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" name="w" />
              <div class="input-group-append">
                <button href="{{ route('Edu.front.topic.index') }}" class="btn btn-outline-secondary">搜索</button>
                <a href="{{ route('Edu.front.topic.create') }}" class="btn btn-outline-secondary">发表</a>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          @foreach ($topics as $topic)
          @include('edu::components.topic')
          @endforeach
        </div>
        <div class="card-footer">
          @include('edu::layouts.paginate',['data'=>$topics])
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      @include('edu::components.tip')
    </div>
  </div>
</div>

@endsection
