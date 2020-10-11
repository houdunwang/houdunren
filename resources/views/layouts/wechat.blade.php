@extends('layouts.module.master')

@section('scripts')
@stack('vue')
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@stack('scripts')
@endsection
