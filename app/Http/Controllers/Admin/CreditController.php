<?php

namespace App\Http\Controllers\Admin;

use App\Models\Credit;
use App\Repositories\CreditRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Admin-credit');
    }

    public function index()
    {
        //
    }

    public function create(CreditRepository $repository)
    {
        $credits = $repository->all();
        return view('admin.credit.create', compact('credits'));
    }

    public function store(Request $request, CreditRepository $repository)
    {
        $repository->saveAll($request->input('credits'));
        return back()->with('success', '修改成功');
    }

    public function show(Credit $credit)
    {
        return view('admin.credit.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credit $credit
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Credit $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credit $credit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
