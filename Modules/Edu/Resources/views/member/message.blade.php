@extends('member.layouts.master')
@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-white">
    站内消息
  </div>
  <div class="card-body ">
    @forelse ($notifications as $notification)
    @include('edu::layouts._message')
    @empty
    <div class="text-center p-3 text-secondary">
      <i class="fas fa-info-circle    "></i> 暂无消息
    </div>
    @endforelse
  </div>
  @if ($notifications->total()>1)
  <div class="card-footer">
    {{ $notifications->links() }}
  </div>
  @endif
</div>

@endsection
