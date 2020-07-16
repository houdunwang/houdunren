@extends('edu::layouts.front')

@section('content')
<div id="app" class="mb-5">
    <form action="{{ route('Edu.front.topic.update',$topic) }}" method="post">
        @csrf
        @method('PUT')

        @include('edu::topic.form')
    </form>
</div>
@endsection
