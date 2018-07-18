@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'模板风格'])
        @slot('nav')
        @endslot
        @slot('body')
            <div class="card-body">
                <div class="row">
                    @foreach($templates as $template)
                        <div class="card col-sm-3">
                            <div class="card-block">
                                <img src="{{$template['preview']}}" style="height: 160px; width: 100%">
                            </div>
                            @if(\HDModule::config('article.config.template') == $template['name'])
                                <a href="/article/template/set/{{$template['name']}}" class="btn btn-success btn-block">正在使用</a>
                            @else
                                <a href="/article/template/set/{{$template['name']}}" class="btn btn-secondary btn-block">设置默认</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endslot
    @endcomponent
@endsection
