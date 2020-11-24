@extends('edu::front.layouts.master')
@section('content')
<div id="app" class="mb-5">
  <form action="{{ route('Edu.front.topic.store') }}" method="post">
    @csrf
    @include('edu::topic.form')
  </form>
</div>
@endsection
