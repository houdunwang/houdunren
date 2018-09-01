@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center mt-4">
        <form action="{{route('admin.config.update',['name'=>'aliyun'])}}" method="post" class="col-sm-9">
            @csrf @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>阿里云</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>regionId</label>
                        <input type="text" class="form-control" name="regionId" value="{{$config['data']['regionId']??'cn-hangzhou'}}">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">accessId</label>
                        <input type="password" class="form-control" name="accessId" value="{{$config['data']['accessId']}}" placeholder="登录阿里云后台查看">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">accessKey</label>
                        <input type="password" class="form-control" name="accessKey" value="{{$config['data']['accessKey']}}" placeholder="登录阿里云后台查看">
                    </div>
                    <button class="btn btn-block btn-primary">
                        保存
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
