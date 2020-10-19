@extends('layouts.module.system')

@section('content')
@include('wechat.news.nav')

@foreach ($news as $new)
<div class="col-2">
  <div class="card shadow-sm">
    <div class="wechat-news">
      @foreach ($new['contents'] as $article)
      <div>
        <img src="{{ $article['picurl'] }}" />
        <h2>{{ $article['title'] }}</h2>
      </div>
      @endforeach
    </div>
    <div class="card-footer text-center">
      <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a href="{{ route('wechat.news.edit',$new) }}" class="btn btn-success">编辑</a>
        <btn-del action="{{ route('wechat.rule.destroy',$new->rule_id) }}" class="btn btn-secondary">
          删除
        </btn-del>
      </div>
    </div>
  </div>
</div>
@endforeach


{{-- <div class="table-responsive">
  <table class="table table-bordered mt-3 ">
    <thead>
      <tr>
        <th width="80">ID</th>
        <th width="80">规则编号</th>
        <th>公众号</th>
        <th>规则名称</th>
        <th>关键词</th>
        <th width="110"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($news as $n)
      <tr>
        <td>{{ $n['id'] }}</td>
<td>{{ $n->rule->id }}</td>
<td>{{ $n->rule->title }}</td>
<td>{{ $n->rule->wechat->title }}</td>
<td>
  @foreach ($n->rule->keywords as $keyword)
  <span class="badge badge-info mr-2">{{ $keyword['word'] }}</span>
  @endforeach
</td>
<td class="text-right">
  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{ route('wechat.news.edit',$n) }}" class="btn btn-success">编辑</a>
    <btn-del action="{{ route('wechat.rule.destroy',$n->rule_id) }}" class="btn btn-secondary">
      删除
    </btn-del>
  </div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div> --}}

@endsection
