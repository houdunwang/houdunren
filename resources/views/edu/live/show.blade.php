@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    @include('edu.layouts._live')
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.scrollTo('body', '.card-header', 1000, {queue: true});
        });
    </script>
@endpush