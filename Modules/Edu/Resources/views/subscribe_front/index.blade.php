@extends('edu::layouts.front')
@section('title','订阅会员提升技能')
@section('content')
<div class="subscribe">
    <div class="header">
        <h1 class="text-white text-center">投资学习会得到加倍的回报</h1>
        <h2>订阅会员免费观看网站所有视频</h2>
    </div>
    <div class="container items" id="app">
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a target="_blank" href="{{ route('Edu.pay.subscribe.alipay',$subscribe) }}"
                                class="btn btn-success btn-sm">支付宝付款(推荐)</a>
                            @desktop
                            <button type="button" class="btn btn-outline-info btn-sm " data-toggle="modal"
                                data-target="#exampleModal{{ $subscribe['id'] }}">
                                微信支付
                            </button>

                            @push('scripts')
                            <script>
                                $('#exampleModal{{ $subscribe['id'] }}').on('show.bs.modal', function (e) {
                                let img = e.target.querySelector('img');
                                img.src = img.dataset.url;
                            })
                            </script>
                            @endpush
                            <div class="modal fade" id="exampleModal{{ $subscribe['id'] }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img data-url="{{ route('Edu.pay.subscribe.wepay',$subscribe['id']) }}">
                                            <span class="d-block">使用微信扫描二维码进行支付</span>
                                            <div class="btn-group mt-2" role="group">
                                                <button type="button" class="btn btn-outline-success btn-sm"
                                                    onclick="changeQr('exampleModal{{ $subscribe['id'] }}')">刷新二维码</button>
                                                <a href="{{ route('Edu.member.duration') }}"
                                                    class="btn btn-info btn-sm">完成付款</a>

                                                @push('scripts')
                                                <script>
                                                    function changeQr(id){
                                                                const img  = document.getElementById(id).querySelector('img');
                                                                img.src = img.dataset.url+'?_'+Math.random();
                                                            }
                                                </script>
                                                @endpush
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @enddesktop

                            @mobile
                            <a href="{{ route('Edu.pay.subscribe.wepay',$subscribe['id']) }}"
                                class="btn btn-info btn-sm border-left">
                                微信支付
                            </a>
                            @endmobile
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container text-secondary instruct text-center">
        <a href="{{ route('Edu.member.duration') }}" class="mb-3 btn btn-sm btn-info shadow-sm">
            <i class="fas fa-info-circle"></i> 支付成功后查看会员周期
        </a>

        <p> 视频属于虚拟物品，购买后不支持退款</p>

        <p>
            支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。
            祝你学有所成，加油！
        </p>
    </div>
</div>
@endsection
