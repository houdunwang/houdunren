@extends('layouts.account')
@section('content')
<register account="{{ old('account') }}" code="{{ old('code') }}"></register>
{{-- <x-input name="password" title="密码" placeholder="请输入密码" type="password"></x-input>
            <x-input name="password_confirmation" title="确认密码" placeholder="请输入确认密码" type="password">
            </x-input> --}}
@endsection
