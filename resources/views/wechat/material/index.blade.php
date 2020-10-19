@extends('layouts.module.system')

@section('content')
@include('wechat.material.nav')

<div class="card image">
  <div class="card-body">
    @if (count($materials))
    <div class="row">
      @include('wechat.material.layouts.'.$type)
    </div>
    @else
    暂无素材
    @endif
  </div>
  <div class="card-footer d-flex align-items-center">
    <div>
      <a href="{{ route('wechat.material.create',['type'=>$type]) }}" class="btn btn-info btn-sm">添加素材</a>
    </div>

    <div class="flex-fill d-flex justify-content-end align-items-center">
      {{ $materials->links() }}
    </div>
  </div>
</div>

@endsection
