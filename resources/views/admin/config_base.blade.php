@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{route('admin.config.update',['name'=>'base'])}}" method="post" class="col-sm-12">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts._config_menu')
                    <div class="form-group">
                        <label>验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="code_expire"
                                   value="{{config_get('admin.base.code_expire',60)}}">
                            <div class="input-group-append">
                                <span class="input-group-text">秒</span>
                            </div>
                        </div>
                        <span class="help-block text-muted">验证码发送时间周期</span>
                    </div>
                    <button class="btn btn-sm btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
