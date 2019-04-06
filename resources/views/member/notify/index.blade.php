@extends('layouts.member')
@section('content')
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('member.notify.index'),'active')}}"
               href="{{route('member.notify.index')}}">
                未读消息
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{active_class(if_route('member.notify.all'),'active')}}"
               href="{{module_link('member.notify.all')}}">
                所有消息
            </a>
        </li>
    </ul>
    <table class="table table-bordered bg-light table-striped">
        <thead class="">
        <tr>
            <th>消息内容</th>
            <th width="180">发送时间</th>
            <th width="120" class="text-left">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notifications as $notification)
            <tr>
                <td scope="row">
                    {!!  $notification->data['message']!!}
                </td>
                <td>
                    {{$notification->created_at->diffForHumans()}}
                </td>
                <td class="text-left">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        @if ($notification->data['url'])
                            <a href="{{route('member.notify.show',$notification['id'])}}"
                               class="btn btn-outline-success">查看</a>
                        @endif
                        <form action="{{route('member.notify.destroy',$notification)}}" method="post">
                            @csrf @method('DELETE')
                        </form>
                        <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
                            删除
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$notifications->links()}}
    </div>
@stop