<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduSign;
use App\Repositories\EduSignRepository;
use App\Repositories\EduSignTotalRepository;
use Illuminate\Http\Request;

class SignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }

    public function create(EduSignRepository $repository, EduSignTotalRepository $eduSignTotalRepository)
    {
        $signs = $repository->paginate(50);
        $todaySign = $repository->todaySign(auth()->user());
        $userSignInfo = $eduSignTotalRepository->userInfo(auth()->user());
        return view('edu.sign.create', compact('signs', 'todaySign', 'userSignInfo'));
    }

    public function store(Request $request, EduSignRepository $repository)
    {
        $repository->create($request->all());
        return back()->with('success', '签到成功，请继续保持每日签到');
    }

    public function show(EduSign $eduSign)
    {
    }

    public function edit(EduSign $eduSign)
    {
    }

    public function update(Request $request, EduSign $eduSign)
    {
    }

    public function destroy(EduSign $sign,EduSignRepository $repository)
    {
        $this->authorize('delete', $sign);
        $repository->delete($sign);
        return back()->with('success','签到删除成功');
    }
}
