@extends('layouts.auth')
@section('content')
<register account="{{ old('account') }}" code="{{ old('code') }}"></register>
@endsection
