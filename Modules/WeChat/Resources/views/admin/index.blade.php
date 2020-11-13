@inject('text', 'Modules\WeChat\Entities\WeChatText')
@inject('news', 'Modules\WeChat\Entities\WeChatNews')
@inject('news', 'Modules\WeChat\Entities\WeChatNews')
@inject('wechatUser', 'App\Models\WeChatUser')
@inject('material', 'Modules\WeChat\Entities\WeChatMaterial')
@extends('layouts.module.admin')
@section('content')
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              微信公众号
            </div>
            <div class="h5 mb-0 d-flex">
              @foreach (site()->wechats as $wechat)
              <a href="{{ route('wechat.wechat.index',site()) }}"
                 class="small d-flex align-items-center mr-2 text-secondary">
                {{ $wechat['title'] }}
                @if (!$loop->last)
                /
                @endif
              </a>
              @endforeach
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              微信消息
            </div>
            <div class="h5 mb-0 text-gray-800 d-flex ">
              <a href="{{ route('WeChat.admin.text.index') }}"
                 class="small d-flex align-items-center text-secondary">
                文本消息 <strong class="">{{ $text->site()->count() }}</strong>条
              </a> /
              <a href="{{ route('WeChat.admin.news.index') }}"
                 class="small d-flex align-items-center text-secondary">
                图文消息 <strong class="">{{ $news->site()->count() }}</strong>条
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              微信素材
            </div>
            <div class="h5 mb-0 text-gray-800 d-flex ">
              <a href="{{ route('WeChat.admin.material.index',['type'=>'image']) }}"
                 class="small d-flex align-items-center text-secondary">
                图片素材 <strong class="">{{$material->site()->where('type','image')->count()  }}</strong>条
              </a> /
              <a href="{{ route('article.admin.category.index') }}"
                 class="small d-flex align-items-center text-secondary">
                音频素材 <strong class="">{{$material->site()->where('type','voice')->count()  }}</strong>条
              </a>
              <a href="{{ route('article.admin.category.index') }}"
                 class="small d-flex align-items-center text-secondary">
                图文素材 <strong class="">{{$material->site()->where('type','news')->count()  }}</strong>条
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              粉丝
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                共有 {{$wechatUser->site()->count() }} 个粉丝
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.module.system-menu')
<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最新关注</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered" width="100%" style="width: 100%;">
          <thead>
            <tr>
              <th width="60">编号</th>
              <th>昵称</th>
              <th width="100">城市</th>
              <th width="100">性别</th>
              <th width="100">时间</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($wechatUser->site()->limit(10)->latest()->get() as $user)
            <tr role="row" class="odd">
              <td>{{ $user->id }}</td>
              <td>{{ $user->nickname }}</td>
              <td>{{ $user->city }}</td>
              <td>{{ $user->gender }}</td>
              <td>{{ $user['created_at']->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection

@push('styles')
<style>
  #app {
    background-color: transparent !important;
    box-shadow: none !important;
  }

  table {
    table-layout: fixed;
  }

  table tbody tr td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
@endpush
