<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduShop;
use Illuminate\Http\Request;

//订阅商品类型
class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('edu.shop.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(EduShop $eduShop)
    {
    }

    public function edit(EduShop $eduShop)
    {
    }

    public function update(Request $request, EduShop $eduShop)
    {
    }

    public function destroy(EduShop $eduShop)
    {
    }
}
