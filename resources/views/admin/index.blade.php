@extends('layouts.admin')

@section('content')
<div>
    <button class="btn btn-info mb-3">
        <i class="fa fa-plus" aria-hidden="true"></i> 添加网站
    </button>

    <div class="card mb-3 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <div>
                套餐:
            </div>
            <div>
                <i class="fa fa-cog" aria-hidden="true"></i> 应用扩展
            </div>
        </div>
        <div class="card-body">
            <i class="fa fa-rss fa-3x mr-3" aria-hidden="true"></i>
            <span class="h3">houdunren</span>
        </div>
        <div class="card-footer text-muted d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="small">
                创建时间: 2020-5-12 站长: 向军大叔 所属组: 普通会员组
            </div>
            <div class="small">
                <a href="" target="_blank" class="text-muted mr-2">
                    <i aria-hidden="true" class="fa fa-home"></i> 访问首页
                </a>
                <a href="" class="text-muted mr-2">
                    <i class="fa fa-life-ring"></i> 更新缓存
                </a>
                <a href="" class="text-muted mr-2">
                    <i aria-hidden="true" class="fa fa-check-circle-o"></i> 网站配置
                </a>
                <a href="" class="text-muted mr-2">
                    <i class="fa fa-comment-o"></i> 微信公众号
                </a>
                <a href="" class="text-muted mr-2">
                    <i class="fa fa-user-o"></i> 用户列表
                </a>
                <a href="" class="text-muted mr-2">
                    <i class="fa fa-user-circle-o"></i> 操作员设置
                </a>
                <a href="" class="text-muted mr-2">
                    <i class="fa fa-pencil-square-o"></i> 编辑
                </a>
                <a href="" class="text-muted">
                    <i class="fa fa-trash"></i> 删除
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
