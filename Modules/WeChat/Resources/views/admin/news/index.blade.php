@extends('layouts.module.master')
@section('content')
@include('wechat::admin.news.nav')
<div class="row">
  @foreach ($news as $new)
  <div class="col-2">
    <div class="card shadow-sm">
      <div class="wechat-news">
        @foreach ($new['contents'] as $article)
        @if ($loop->first)
        <div>
          <img src="{{ $article['picurl'] }}" />
          <h2>{{ $article['title'] }}</h2>
        </div>
        @endif
        @endforeach
      </div>
      <div class="card-footer text-center">
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          <a href="{{ route('WeChat.admin.news.edit',$new) }}" class="btn btn-success">编辑</a>
          <btn-del action="{{ route('WeChat.admin.news.destroy',$new) }}" class="btn btn-secondary">
            删除
          </btn-del>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
