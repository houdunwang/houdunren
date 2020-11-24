@extends('member.layouts.master')

@section('content')
<form action="{{ route('member.avatar.store') }}" method="post">
  @csrf
  <div class="card">
    <div class="card-header bg-white">
      头像设置
    </div>
    <div class="card-body">
      <x-form theme="image" action="{{ route('member.avatar.upload') }}" name="avatar" class="col-12 col-sm-6"
              value="{{ user()->icon }}"></x-form>
    </div>

    <div class="card-footer bg-white">
      <button class="btn btn-primary">保存</button>
    </div>
  </div>
</form>

@endsection
