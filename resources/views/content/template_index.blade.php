@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @component('components.nav',['navs'=>[
                ['title'=>'模块风格','url'=>'#','active'=>true]
            ]])
            @endcomponent
        </div>
        <div class="card-body listAlias">
            @foreach($themes as $theme)
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card">
                        <a href="{{route('content.template.update',$theme)}}">
                            <img src="{{$theme['preview']}}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h 4 class="card-title mb-2 name">
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
@endsection