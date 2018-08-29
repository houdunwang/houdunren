@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center mt-4">
        <form action="{{route('admin.config.update',['name'=>'site'])}}" method="post" class="col-sm-9">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>网站配置</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>网站名称</label>
                        <input type="text" class="form-control" name="webname" value="{{$config['data']['webname']??'后盾人'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">网站关键字</label>
                        <input type="text" class="form-control" name="keywords" value="{{$config['data']['keywords']??'PHP,Linux,HTML5'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">网站描述</label>
                        <textarea class="form-control" rows="3" name="description">{{$config['data']['description']??'后盾人专注PHP与WEB开发实战'}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">备案号</label>
                        <input type="text" class="form-control" name="icp" value="{{$config['data']['icp']??'京ICP备'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">联系电话</label>
                        <input type="text" class="form-control" name="tel" value="{{$config['data']['tel']}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">联系邮箱</label>
                        <input type="text" class="form-control" name="email" value="{{$config['data']['email']}}">
                    </div>
                    <button class="btn btn-block btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
