@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-header-title text-secondary">
                                    话题列表
                                </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('edu.topic.create')}}" class="btn btn-xs btn-secondary">
                                    发表
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-lg list-group-flush list my--4">
                        @include('edu.topic.layouts._topic_lists')
                        </ul>
                    </div>
                </div>

                <div class="mt-5">
                    {{$topics->appends(['id'=>Request::query('id')])->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection