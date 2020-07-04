@extends('layouts.admin')

@section('content')
<nav class="nav nav-tabs">
    <a class="nav-link" href="{{ route('admin.setting') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>
    <a class="nav-link active" href="#">
        系统配置
    </a>
</nav>
<form action="{{ route('admin.config.update') }}" method="post">
    @csrf
    @method('PUT')

    <div class="card mt-3">
        <div class="card-header">
            系统配置
        </div>
        <div class="card-body">
            <x-form type="text" name="title" title="后台名称" class="col-12 col-sm-6" value="{{ config('admin.title') }}">
            </x-form>

            <x-form theme="image" action="{{ route('admin.config.upload') }}" title="后台标志" name="logo"
                class="col-12 col-sm-6" value="{{ config('admin.logo') }}"></x-form>

            <x-form theme="textarea" type="text" name="copyright" title="后台页脚" class="col-12 col-sm-6">
                {{ config('admin.copyright') }}
            </x-form>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary btn-sm">保存</button>
        </div>
    </div>
</form>
@endsection
