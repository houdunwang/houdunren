@extends('edu::layouts.front')

@section('content')
<div class="subscribe">
    <div class="header">
        <h1 class="text-white text-center">投资学习会得到加倍的回报</h1>
        <h2>订阅会员免费观看网站所有视频</h2>
    </div>
    <div class="container items">
        <div class="row">
            @foreach ($subscribes as $subscribe)
            <div class="col-12 col-md-4 mt-3">
                <div class="card shadow-lg item">
                    <div class="card-body text-center pb-4 pt-5 shadow">
                        <i class="fa-6x text-primary {{ $subscribe['icon'] }}"></i>
                        <div class="mt-2 mb-2">
                            <span class="price">{{ (int)$subscribe['price'] }}</span>
                            <small class="text-secondary">元</small>
                        </div>
                        <div class="title font-weight-bold text-secondary">{{ $subscribe['title'] }}</div>
                    </div>
                    <div class="card-footer text-muted text-center pb-5 pt-4 shadow">
                        <h5 class="text-center mb-3 mt-2">{{ $subscribe['ad'] }}</h5>
                        <a href="{{ route('Edu.pay.subscribe.alipay',$subscribe) }}" class="btn btn-success">去支付宝付款</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container text-secondary instruct text-center">
        <p> 视频属于虚拟物品，购买后不支持退款</p>
        <p>
            支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。
            祝你学有所成，加油！
        </p>
    </div>
</div>
@endsection
