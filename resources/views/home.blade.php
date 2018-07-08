@extends('layouts.app')
@section('content')
    <form action="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('layouts._message')
                    @include('layouts._validate')
                    <hr>
                    {{--{!! $html !!}--}}
                </div>
            </div>
        </div>
    </form>
@endsection
