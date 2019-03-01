@extends('layouts.member')
@section('content')
    <form action="{{route('member.info.store')}}" method="post">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header">修改手机号</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>手机号</label>
                            <input type="text" name="mobile" class="form-control" required
                                   value="{{old('mobile',$user['mobile']??'')}}">
                        </div>
                        <div class="form-group">
                            <label>验证码</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="code" placeholder="请输入验证码"
                                       value="{{old('code')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="sendCode">
                                        发送验证码
                                    </button>
                                </div>
                            </div>
                            <script>
                                send_code("#sendCode", '[name="mobile"]');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-block d-sm-none mt-3">保存提交</button>
        <button class="btn btn-success mt-3 d-none d-sm-block">保存提交</button>
    </form>
@stop