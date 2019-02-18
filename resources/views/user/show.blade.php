@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="fa fa-home"></i> <a href="{{route('site.index')}}">站点列表</a>
        </li>
        <li class="breadcrumb-item"><a href="#">会员操作权限</a></li>
    </ol>
    <div class="card">
        <div class="card-header">用户组信息</div>
        <div class="card-body">
            <table class="table">
                <tbody>
                <tr>
                    <td width="150">用户组名</td>
                    <td>{{$user->group['name']}}</td>
                </tr>
                <tr>
                    <td scope="row">最多站点数量</td>
                    <td>{{$user->group['site_num']}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">可使用站点</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th width="150">站点</th>
                    <th>角色</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->site as $site)
                    <tr>
                        <td scope="row">{{$site['name']}}</td>
                        <td>{{$site['role']['role']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection