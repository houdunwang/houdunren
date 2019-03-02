@extends('layouts.site')
@section('content')
    <div class="row">
        @foreach ($modules as $module)
            <div class="col-sm-2 col-6">
                <div class="card bg-light">
                    <a href="{{module_link('module.module.show',$module,site(),$module)}}">
                        <img class="card-img-top" src="{{$module['package']['thumb']}}">
                    </a>
                    <div class="card-body p-2 text-center">
                        <h6 class="p-0 m-0">
                            <a href="{{module_link('module.module.show',$module,site(),$module)}}" class="text-dark">{{$module['title']}}</a>
                        </h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop