@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center mt-4">
        <form action="{{route('admin.config.update',['name'=>'mail'])}}" method="post" class="col-sm-9">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>邮箱配置</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>邮箱类型</label>
                        <input type="text" class="form-control" name="MAIL_DRIVER" value="{{$config['data']['MAIL_DRIVER']??'smtp'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">主机</label>
                        <input type="text" class="form-control" name="MAIL_HOST" value="{{$config['data']['MAIL_HOST']??'smtp.qq.com'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">端口</label>
                        <input type="text" class="form-control" name="MAIL_PORT" value="{{$config['data']['MAIL_PORT']??25}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">发送帐号</label>
                        <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{$config['data']['MAIL_FROM_ADDRESS']}}" placeholder="收件人邮箱显示的发送帐号">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">邮箱帐号</label>
                        <input type="text" class="form-control" name="MAIL_USERNAME" value="{{$config['data']['MAIL_USERNAME']}}" placeholder="发送邮箱登录帐号">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">邮箱密码</label>
                        <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{$config['data']['MAIL_PASSWORD']}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">加密方式</label>
                        <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{$config['data']['MAIL_ENCRYPTION']??'tls'}}">
                    </div>
                    <button class="btn btn-block btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
