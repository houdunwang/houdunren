@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container {{route_class()}}">
        <div class="row p-5">
            <div class="col-12">
                <div class="mb-3">
                    <span class="text-muted font-weight-bold">搜索结果</span>
                </div>
                <hr>
                <ul class="list-unstyled mb-0">
                    @include('edu.search._'.Request::query('t'))
                </ul>
                <div class="mt-5">
                    {{$data->appends(['t'=>$_GET['t'],'w'=>$_GET['w']])->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
