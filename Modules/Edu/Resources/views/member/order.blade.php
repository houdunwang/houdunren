@extends('edu::layouts.member')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white">
        定单列表
    </div>
    <div class="card-body ">
        <table class="table ">
            <thead>
                <tr>
                    <th>单号</th>
                    <th>商品</th>
                    <th>类型</th>
                    <th>购买时间</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order['sn'] }}</td>
                    <td>{{ $order['subject'] }}</td>
                    <td>
                        {{ $order->title }}
                    </td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            @include('edu::layouts.paginate',['data'=>$orders])
        </div>
    </div>
</div>
@endsection