@extends('layouts.module')

@section('content')
<nav class="nav nav-tabs">
    <a class="nav-link active" href="#">
        模块配置
    </a>
</nav>
<form action="{{ route('module.config.store') }}" method="post">
    @csrf
    <div class="card mt-3">
        <div class="card-header">
            课程资料
        </div>
        <div class="card-body">
            @include('edu::hdcms.config.edit')
        </div>
    </div>
    <div class="mt-3">
        <button class="btn btn-primary mt-3">保存提交</button>
    </div>
</form>
@endsection
