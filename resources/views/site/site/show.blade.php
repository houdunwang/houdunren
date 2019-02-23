@extends('layouts.site')
@section('content')
    <div class="row">
        @foreach ($modules as $module)
            <div class="col-sm-2 col-6">
                <div class="card bg-light">
                    <a href="{{route('module.module.show',$module['id'])}}">
                        <img class="card-img-top" src="{{$module['package']['thumb']}}">
                    </a>
                    <div class="card-body p-2 text-center">
                        <h6 class="p-0 m-0">
                            <a href="{{route('module.module.show',$module['id'])}}" class="text-dark">{{$module['title']}}</a>
                        </h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop