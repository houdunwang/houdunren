@extends('layouts.module.master')

@section('scripts')
@stack('vue')
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="/admin2/sb-admin-2.min.js"></script>
@stack('scripts')
@endsection
