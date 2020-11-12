@inject('lesson', 'Modules\Edu\Entities\Lesson')
@inject('video', 'Modules\Edu\Entities\Video')
@inject('order', 'Modules\Edu\Entities\Order')
@extends('layouts.module.admin')
@section('content')
<div class="row">
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              课程
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('Edu.admin.lesson.index') }}" class="small text-secondary">
                共发布了<strong class="h5 font-weight-bold">{{ $lesson->site()->count() }}</strong>个课程
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              视频
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                共有<strong class="h5 font-weight-bold">{{ $video->site()->count() }}</strong>个视频
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              订单
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                订单总额<strong class="h5 font-weight-bold">{{ $order->site()->sum('price') }}</strong> 元
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最新课程</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered" width="100%" style="width: 100%;">
          <thead>
            <tr>
              <th width="60">编号</th>
              <th>标题</th>
              <th width="100">创建</th>
              <th width="100">更新</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lesson->limit(10)->latest()->get() as $lesson)
            <tr role="row" class="odd">
              <td>{{ $lesson->id }}</td>
              <td>{{ $lesson->title }}</td>
              <td>{{ $lesson['created_at']->diffForHumans()}}</td>
              <td>{{ $lesson['updated_at']->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最多查看</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="60">编号</th>
              <th>标题</th>
              <th width="100">栏目</th>
              <th width="100">模型</th>
              <th width="100">创建</th>
              <th width="100">更新</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lesson->limit(10)->orderBy('read_num')->get() as $lesson)
            <tr>
              <td>{{ $lesson->id }}</td>
              <td>{{ $lesson->title }}</td>
              <td>{{ $lesson['created_at']->diffForHumans()}}</td>
              <td>{{ $lesson['updated_at']->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection

@push('styles')
<style>
  #app {
    background-color: transparent !important;
    box-shadow: none !important;
  }

  table {
    table-layout: fixed;
  }

  table tbody tr td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
@endpush
