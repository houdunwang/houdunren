@extends('layouts.member')
@section('content')
    <div class="card border-bottom-0">
        <div class="card-header border-bottom-0">
            我的订单
        </div>
    </div>
    <table class="table table-bordered text-center bg-white">
        <thead>
        <tr>
            <th>编号</th>
            <th>商品名称</th>
            <th>售价</th>
            <th>购买时间</th>
            <th>支付状态</th>
        </tr>
        </thead>
        <tbody class="text-secondary">
        @foreach($pays as $pay)
            <tr>
                <td>{{$pay['id']}}</td>
                <td>
                    <a href="{{route('member.order.show',$pay)}}" class="text-info">{{$pay['subject']}}</a>
                </td>
                <td>
                    {{$pay['price']}}
                </td>
                <td>{{$pay['updated_at']}}</td>
                <td>
                    @if ($pay['status'])
                        <i class="fa fa-check-circle text-success"></i>
                    @else
                        <i class="fa fa-times-circle"></i>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$pays->links()}}
    </div>
@stop