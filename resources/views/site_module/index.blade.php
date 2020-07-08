@extends('layouts.admin')

@section('content')
<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('admin.index'))}}" href="{{ route('admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link active" href="#">
        应用管理
    </a>
</nav>

<div class="card mt-3 shadow-sm">
    <div class="card-header">
        应用列表
    </div>
    <div class="card-body">
        <div class="row p-3">
            @foreach ($site->modules as $module)
            <div class="col-6 col-sm-2">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="{{ $module['preview'] }}" class="rounded rounded-circle" style="width:55px;" />
                        <div class="mt-3 text-dark font-weight-bold h6">
                            {{ $module['title'] }}
                        </div>
                        <div class="mt-3 text-secondary small">
                            {{ $module['description'] }}
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <a href="{{ route('site.module.show',[$site,$module]) }}" class="btn btn-info">管理模块</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
