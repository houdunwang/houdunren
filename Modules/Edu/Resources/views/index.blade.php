@extends('edu::layouts.front')

@section('content')

<div>
    <div class="container mt-3 mt-md-5 mb-5">
        <div class="row">
            <div class="col-12 col-sm-9 mt-2">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between">
                        社区动态
                        <a href="{{ route('Edu.front.topic.create') }}" class="btn btn-outline-secondary btn-sm">发表</a>
                    </div>
                    <div class="card-body">
                        @include('edu::components.log')
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3 mt-2 pl-0">
                @include('edu::components.tip')

                @include('edu::components.learn')
            </div>
        </div>
    </div>
</div>

@endsection
