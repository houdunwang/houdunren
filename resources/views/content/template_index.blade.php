@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link mr-3 active">
                            模板风格
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.template.cache')}}" class="nav-link mr-3">
                            更新模板
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row listAlias">
                    @foreach($themes as $theme)
                        <div class="col-12 col-md-6 col-xl-3">
                            <div class="card">
                                <a href="{{route('content.template.update',$theme)}}">
                                    <img src="{{$theme['preview']}}" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title mb-2 name">
                                                <a href="{{route('content.template.update',$theme)}}">
                                                    {{$theme['title']}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    @if($theme['using'])
                                                        <a href="{{route('content.template.update',$theme)}}"
                                                           class="btn btn-primary btn-sm">
                                                            使用中
                                                        </a>
                                                    @else
                                                        <a href="{{route('content.template.update',$theme)}}"
                                                           class="btn btn-light btn-sm">
                                                            未使用
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection