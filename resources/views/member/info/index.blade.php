@extends('layouts.member')
@section('content')
    <form action="{{route('member.info.store')}}" method="post">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header">修改资料</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>昵称</label>
                            <input type="text" name="name" class="form-control" required
                                   value="{{old('name',$user['name']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>个人网站</label>
                            <input type="text" name="home" class="form-control"
                                   value="{{old('home',$user['home']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>微博帐号</label>
                            <input type="text" name="weibo" class="form-control"
                                   value="{{old('weibo',$user['weibo']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>微信号</label>
                            <input type="text" name="wechat" class="form-control"
                                   value="{{old('wechat',$user['wechat']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>GitHub</label>
                            <input type="text" name="github" class="form-control"
                                   value="{{old('github',$user['github']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>QQ</label>
                            <input type="text" name="qq" class="form-control"
                                   value="{{old('qq',$user['qq']??'')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-block d-sm-none mt-3">保存提交</button>
        <button class="btn btn-success mt-3 d-none d-sm-block">保存提交</button>
    </form>
@stop