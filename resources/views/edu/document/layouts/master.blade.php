@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                @include('edu.document.layouts._menu')
            </div>
            <div class="col-9">
                @yield('document_content')
            </div>
        </div>
    </div>
@endsection