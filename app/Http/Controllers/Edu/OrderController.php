<?php

namespace App\Http\Controllers\Edu;

use App\Models\EduOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = EduOrder::where('user_id',auth()->id())->where('status',true)->latest()->paginate(10);
        return view('edu.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EduOrder $eduOrder
     * @return \Illuminate\Http\Response
     */
    public function show(EduOrder $eduOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EduOrder $eduOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(EduOrder $eduOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\EduOrder $eduOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EduOrder $eduOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EduOrder $eduOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(EduOrder $eduOrder)
    {
        //
    }
}
