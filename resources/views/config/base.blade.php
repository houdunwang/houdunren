@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <form action="{{route('admin.config.update',['name'=>'base'])}}" method="post" class="col-sm-9">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>基本配置</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="code_expire" value="{{$config['data']['code_expire']??'60'}}">
                            <div class="input-group-append">
                                <span class="input-group-text">秒</span>
                            </div>
                        </div>
                        <span class="help-block text-muted">验证码发送时间周期</span>
                    </div>
                    <button class="btn btn-block btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
