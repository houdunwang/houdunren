<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}


function user($key = '')
{
    $user = Auth::user();
    return $key ? $user[$key] : $user;
}
