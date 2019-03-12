<?php

namespace App\Http\Controllers\Member;

use App\Models\Pay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;

/**
 * 支付定单
 * Class OrderController
 * @package App\Http\Controllers\Member
 */
class OrderController extends Controller
{
    public function index()
    {
        $pays = auth()->user()->pays()->latest()->paginate(20);
        return view('member.order.index', compact('pays'));
    }

    public function show(Pay $order)
    {
        try {
            if (!$order->relation) {
                throw new \Exception();
            }
            return redirect($order->relation->link());
        } catch (\Exception $exception) {
            return back()->with('error', '页面不存在或商品已经下架');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pay $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
