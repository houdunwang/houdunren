@extends('layouts.member.mobile')
@section('content')
    @inject('ModuleRepository','App\Repositories\ModuleRepository')
    <div class="card mb-1">
        <div class="card-body header border-top border-info">
            <div class="media">
                <img src="{{auth()->user()['avatar']}}" class="mr-3" style="height: 45px;">
                <div class="media-body">
                    <h5 class="mt-0">{{auth()->user()['name']}}</h5>
                    <div class="text-left">
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-envelope {{active_class(auth()->user()['email'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
                            <i class="fa fa-phone-square" {{active_class(auth()->user()['mobile'],'text-info')}}></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-weibo {{active_class(auth()->user()['weibo'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-wechat {{active_class(auth()->user()['wechat'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-github {{active_class(auth()->user()['github'],'text-info')}}"></i>
                        </a>
                        <a class="mb-0 mr-2" href="{{route('member.info.index')}}">
                            <i class="fa fa-qq {{active_class(auth()->user()['qq'],'text-info')}}"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-0 mt-sm-2 shadow-sm border-bottom-0">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="{{route('member.info.index')}}" class="d-block">资料修改</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('member.change-password.index')}}" class="d-block">修改密码</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('member.icon.index')}}" class="d-block">设置头像</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('member.mail.index')}}" class="d-block">绑定邮箱</a>
                </li>
                <li class="list-group-item">
                    <a href="{{module_link('member.mobile.index')}}" class="d-block">修改手机</a>
                </li>
            </ul>
        </div>
    </div>
    @foreach($ModuleRepository->getMenus(site(),'member_mobile') as $moduleTitle=>$menus)
        @if (count($menus['menus']))
            <div class="card mt-0 border-top-0">
                <div class="card-header">
                    {{$moduleTitle}}
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($menus['menus'] as $menu)
                            <a class="list-group-item list-group-item-action text-secondary"
                               href="{{$menu['url']}}?sid={{\site()['id']}}&mid={{$menus['module']['id']}}">
                                {{$menu['title']}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@stop