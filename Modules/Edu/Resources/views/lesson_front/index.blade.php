@extends('edu::layouts.front')
@section('title','实战课程')
@section('content')
<div class="container search mt-5 mb-3">
  <div class="row">
    <div class="col-12 ">
      <div class="bg-white border shadow-sm p-4">
        <form action="{{ route('Edu.front.lesson.index') }}">
          <div class="input-group">
            <input type="text" name="w" placeholder="请输入搜索关键词" class="form-control">
            <div class="input-group-append">
              <button type="submit" class="input-group-text bg-white">搜索</button>
            </div>
          </div>
        </form>

        <div class="d-flex justify-content-start flex-wrap mt-3 tags ">
          <a href="{{ route('Edu.front.lesson.index') }}" class="btn btn-outline-secondary btn-sm mr-3 mb-2">全部</a>
          @foreach ($tags as $tag)
          <a href="{{ route('Edu.front.lesson.index',['tag'=>$tag['title']]) }}"
            class="btn btn-sm mr-3 mb-2 {{ request()->query('tag')===$tag['title']?'btn-secondary':'btn-outline-secondary' }}">
            {{ $tag['title'] }}
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="row">
    <div class="col-12">
      <div class="bg-white border shadow-sm p-4 ">
        <div class="row">
          @foreach ($lessons as $lesson)
          @include('edu::layouts.lesson')
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="mt-3">
    @include('edu::layouts.paginate',['data'=>$lessons])
  </div>
</div>

@endsection
