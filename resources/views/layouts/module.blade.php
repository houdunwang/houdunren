@extends('layouts.module.master')

@section('scripts')
@stack('vue')
<script src="/modules/{{ module()['name'] }}/app.js?v={{ config('app.version') }}"></script>
<script src="/admin2/sb-admin-2.min.js"></script>
@stack('scripts')
@endsection
