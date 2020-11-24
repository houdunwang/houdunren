@extends('edu::space.layouts.master')
@section('title',$user->name.'贴子列表')
@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white">
    TA的贴子
  </div>
  <div class="card-body ">
    @forelse ($topics as $topic)
    @include('edu::layouts._topic')
    @empty
    <div class="text-center col-12 p-3 text-secondary">
      <i class="fas fa-info-circle"></i> TA 还没有时间发贴子，可能在忙着看视频
    </div>
    @endforelse
  </div>
  @if ($topics->total()>1)
  <div class="card-footer">
    {{ $topics->links() }}
  </div>
  @endif
</div>
@endsection
