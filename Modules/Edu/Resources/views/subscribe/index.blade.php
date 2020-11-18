@extends('layouts.module.admin')

@section('content')
@include('edu::subscribe.nav')
<div class="card mt-3">
  <div class="card-header">
    会员套餐列表
  </div>
  <div class="card-body">
    <div class="row">
      @foreach ($subscribes as $subscribe)
      <div class="col-6 col-sm-3 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-between align-items-center">
              <div class="mb-3 mt-4">
                <i class="{{ $subscribe['icon'] }} fa-6x text-primary" aria-hidden="true"></i>
              </div>
              <h2 class="mb-3">{{ $subscribe['price'] }}</h2>
              <div class="font-weight-bold text-secondary h6">{{ $subscribe['title'] }}</div>
            </div>
          </div>
          <div class="card-footer bg-light">
            <div class="d-flex flex-column align-items-center justify-content-center">
              <h6 class="p-2">{{ $subscribe['ad'] }}</h6>

              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a href="{{ route('Edu.admin.subscribe.edit',$subscribe) }}" class="btn btn-info">编辑</a>
                <hd-btn-del action="{{ route('Edu.admin.subscribe.destroy',$subscribe) }}" class="btn btn-secondary">删除
                  </btn-del>
              </div>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>

@endsection
