@extends('system.layouts.master'))
@section('content')
<div class="card">
  <div class="card-header">
    模板列表
  </div>
  <div class="card-body pt-0 pb-0">
    @foreach ($templates as $template)
    <section class="border-bottom row align-items-center pb-3 pt-3">
      <div class="col-sm-1 pb-3 pb-sm-0">
        <img src="{{ $template['preview'] }}" class="rounded" style="width: 45px;" />
      </div>
      <div class=" col-sm-10 small text-secondary pb-3 pb-sm-0">
        <strong> {{ $template['title'] }} </strong> {{ $template['description'] }}
        <br>
        标识：{{ $template['name'] }}
        版本：{{ $template['version'] }}
      </div>
      <div class="col-sm-1 text-left text-sm-right ">
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
          @if ($template['installed'])
          <btn-del action="{{ route('system.template.uninstall',$template['name']) }}" class="btn btn-secondary">
            删除
          </btn-del>
          @else
          <a href="{{ route('system.template.install',$template['name']) }}" class="btn btn-outline-success">
            安装
          </a>
          @endif
        </div>
      </div>
    </section>
    @endforeach
  </div>
</div>
@endsection
