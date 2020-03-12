@extends('module')
@section('content')
<div id="app">
  <router-view></router-view>
</div>
@endsection

@push('scripts')
<script src="/modules/edu/dist/js/app-vue.js"></script>
{{-- <script src="{{mix('/modules/edu/js/app-vue.js')}}"></script> --}}
@endpush
