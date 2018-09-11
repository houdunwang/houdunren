@extends('edu.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-header-title">
                                动态
                            </h4>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                    筛选
                                </a>
                                <div class="dropdown-menu ">
                                    <a class="dropdown-item sort small" data-sort="name" href="#!">
                                        全部
                                    </a>
                                    <a class="dropdown-item sort small" data-sort="name" href="#!">
                                        关注
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#!" class="btn btn-sm btn-primary">
                                发表
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-lg list-group-flush list my--4">
                        <li class="list-group-item px-0">
                            <div class="row">
                                <div class="col-auto">

                                    <a class="avatar">
                                        <img src="http://www.aoxiangjun.com/images/xjyan.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="card-title mb-2 name">
                                        <a href="https://#/users/87">
                                            向军大叔
                                        </a>
                                        赞了话题
                                        <a href="https://#/topics/15680/laravel-55-a-laravel-package-laravelfyvalidator-enhancement-that-saves-your-code" title="[< Laravel 5.5] 一个帮你省代码的 Laravel 包 `laravelfy/validator-enhancement`">
                                            一个帮你省代码的 Laravel 包 laravelfy/validator-enhancement
                                        </a>
                                    </h4>
                                    <p class="card-text small text-muted">
                                        <i class="fe fe-clock"></i> 3 小时前
                                    </p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#!">上一页</a></li>
                    <li class="page-item"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">下一页</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">
                        公告
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary"> 晚八点直播</a>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary">新手帮助</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
