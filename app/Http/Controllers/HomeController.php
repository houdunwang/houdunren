<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $this->authorize('delete',Site::first());
    }
}
