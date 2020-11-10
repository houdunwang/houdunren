@extends('layouts.module.system')

@section('content')
<div class="row">
  @foreach ($templates as $template)
  <div class="col-2">
    <div class="card shadow-sm">
      <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <img src="{{ $template->preview }}" class="rounded-circle mb-3 preview-image"
             style="width: 80px;">
        <h6>{{ $template->title }}</h6>
        <span class="text-secondary small text-center description">
          {{ $template->description }}
        </span>
      </div>
      <div class="card-footer text-muted text-center">
        @if ( site()->template && site()->template->id==$template->id)
        <span
              class="btn btn-info btn-sm">正在使用</span>
        @else
        <a href="{{ route('article.template.set',$template) }}"
           class="btn btn-outline-secondary btn-sm">设置为默认</a>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
