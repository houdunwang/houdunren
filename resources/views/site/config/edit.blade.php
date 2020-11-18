@extends('layouts.admin.master')

@section('content')
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link " href="{{ route('admin') }}">
      <i class="fa fa-home" aria-hidden="true"></i>
    </a>
    <a class="nav-item nav-link active" id="nav-base-tab" data-toggle="tab" href="#nav-base" role="tab"
       aria-controls="nav-base active" aria-selected="true">基本信息</a>

    <a class="nav-item nav-link " id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab"
       aria-controls="nav-user" aria-selected="false ">用户相关</a>

    <a class="nav-item nav-link" id="nav-aliyun-tab" data-toggle="tab" href="#nav-aliyun" role="tab"
       aria-controls="nav-aliyun" aria-selected="false">阿里云</a>

    <a class="nav-item nav-link" id="nav-alipay-tab" data-toggle="tab" href="#nav-alipay" role="tab"
       aria-controls="nav-alipay" aria-selected="false">支付宝</a>

    <a class="nav-item nav-link" id="nav-wepay-tab" data-toggle="tab" href="#nav-wepay" role="tab"
       aria-controls="nav-wepay" aria-selected="false">微信支付</a>

    <a class="nav-item nav-link" id="nav-upload-tab" data-toggle="tab" href="#nav-upload" role="tab"
       aria-controls="nav-upload" aria-selected="false">上传配置</a>

    <a class="nav-item nav-link" id="nav-email-tab" data-toggle="tab" href="#nav-email" role="tab"
       aria-controls="nav-email" aria-selected="false">邮箱配置</a>

    <a class="nav-item nav-link" id="nav-sms-tab" data-toggle="tab" href="#nav-sms" role="tab"
       aria-controls="nav-sms" aria-selected="false">短信验证码</a>
  </div>
</nav>
<form action="{{ route('site.config.update',$site) }}" method="post">
  @csrf
  @method('PUT')

  <div class="tab-content mt-3" id="nav-tabContent">
    <div class="tab-pane fade-enter show active" id="nav-base" role="tabpanel" aria-labelledby="nav-base-tab">
      @include('site.config._base')
    </div>
    <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
      @include('site.config._user')
    </div>
    <div class="tab-pane fade" id="nav-aliyun" role="tabpanel" aria-labelledby="nav-aliyun-tab">
      @include('site.config._aliyun')
    </div>
    <div class="tab-pane fade" id="nav-alipay" role="tabpanel" aria-labelledby="nav-alipay-tab">
      @include('site.config._alipay')
    </div>
    <div class="tab-pane fade" id="nav-wepay" role="tabpanel" aria-labelledby="nav-wepay-tab">
      @include('site.config._wepay')
    </div>
    <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-tab">
      @include('site.config._upload')
    </div>
    <div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
      @include('site.config._email')
    </div>
    <div class="tab-pane fade" id="nav-sms" role="tabpanel" aria-labelledby="nav-sms-tab">
      @include('site.config._sms')
    </div>
  </div>

  <button class="btn btn-primary mt-3">保存</button>
</form>
@endsection
