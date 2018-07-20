@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header p-2 pl-3">
                        推荐文章
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">cc</div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header p-2 pl-3">
                        推荐文章
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="recommend row mt-3">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <img src="https://lccdn.phphub.org/uploads/banners/YVQloEYur2T9N2gGvZiQ.png?imageView2/1/w/424/h/212" style="width: 100%;">
                            </div>
                            <button class="btn btn-secondary btn-block">这是标题</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <img src="https://lccdn.phphub.org/uploads/banners/YVQloEYur2T9N2gGvZiQ.png?imageView2/1/w/424/h/212" style="width: 100%;">
                            </div>
                            <button class="btn btn-secondary btn-block">这是标题</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <img src="https://lccdn.phphub.org/uploads/banners/YVQloEYur2T9N2gGvZiQ.png?imageView2/1/w/424/h/212" style="width: 100%;">
                            </div>
                            <button class="btn btn-secondary btn-block">这是标题</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <img src="https://lccdn.phphub.org/uploads/banners/YVQloEYur2T9N2gGvZiQ.png?imageView2/1/w/424/h/212" style="width: 100%;">
                            </div>
                            <button class="btn btn-secondary btn-block">这是标题</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header p-2 pl-3">
                                文章列表
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">Cras justo odio
                                    <div class="float-right text-secondary">
                                        <small>3 小时前 /</small>
                                        <small> 32
                                            <i class="fa fa-adn" aria-hidden="true"></i>
                                        </small>
                                    </div>
                                </li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header p-2 pl-3">
                                文章列表
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">Cras justo odio
                                    <div class="float-right text-secondary">
                                        <small>3 小时前 /</small>
                                        <small> 32
                                            <i class="fa fa-adn" aria-hidden="true"></i>
                                        </small>
                                    </div>
                                </li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-3">
        <div class="card">
            <div class="card-footer text-muted">
                <a href="http://www.houdunren.com" class="text-success">后盾人 人人做后盾</a>
                <p class="text-secondary mt-2">
                    我们的使命：传播互联网前沿技术，帮助更多的人实现梦想
                </p>
            </div>
        </div>
    </div>
@endsection
