@extends('layouts.module.master')

@section('scripts')
@stack('vue')
<script src="/modules/{{ module()['name'] }}/app.js?v={{ config('app.version') }}"></script>
@stack('scripts')
@endsection
