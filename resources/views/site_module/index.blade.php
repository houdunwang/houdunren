@extends('layouts.admin')
@inject('permissionService', 'App\Services\PermissionService')
@section('content')
<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('admin') }}">
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
            @forelse ($modules as $module)
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
                        <a href="{{ route('site.module.show',[$site,$module['id']]) }}" class="btn btn-info">管理模块</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center p-3 col-12 text-secondary font-weight-bold">
                <i class="fa fa-info-circle" aria-hidden="true"></i> 你没有可以管理的模块，请联系站点管理员「{{ $site->master->name }}」授权
            </div>
            @endforelse

        </div>
    </div>

</div>
@endsection
