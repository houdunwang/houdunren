@extends('edu::layouts.member')

@section('content')
<div class="card">
  <div class="card-header bg-white">
    会员周期
  </div>
  <div class="card-body h6 text-secondary">
    @if (user()->make()->duration)
    @if (user()->make()->duration->end_time>now())
    你已经订阅会员，会员周期将在 {{ user()->make()->duration->end_time }} 到期
    @else
    您的会员已经到期，继续<a href="{{ route("Edu.front.subscribe.index") }}" class="text-primary">开通会员</a>提升技能
    @endif
    @else
    您还没有加入会员，立刻<a href="{{ route("Edu.front.subscribe.index") }}" class="text-primary">加入会员</a>提升技能
    @endif

  </div>
</div>
@endsection
