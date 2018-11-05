@extends('member.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-secondary">
                <table class="table small">
                    <thead>
                    <tr>
                        <th scope="col">编号</th>
                        <th scope="col">状态</th>
                        <th scope="col">商城交易号</th>
                        <th scope="col">支付宝交易号</th>
                        <th scope="col">金额</th>
                        <th scope="col">创建时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="">
                            <td>{{$order['id']}}</td>
                            <td>{{$order['status']?'完成':'未支付'}}</td>
                            <td>{{$order->order->order_sn}}</td>
                            <td>{{$order->order->alipay_trade_no}}</td>
                            <td>{{$order->order->fee}}</td>
                            <td>{{$order['created_at']->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$orders->links()}}
@endsection