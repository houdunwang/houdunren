<?php

namespace Modules\Edu\Http\Controllers\Front;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\User;

class SignController extends Controller
{
  public function index()
  {
    $signs = Sign::whereDate('created_at', now())
      ->oldest('id')
      ->with('user')
      ->get();

    return view('edu::sign.index', compact('signs'))->with('user', User::firstOrNew(['id' => Auth::id()]));
  }

  public function store(Request $request, Sign $sign)
  {
    $request->validate(
      [
        'content' => ['required', 'between:5,50'],
        'mood' => ['required'],
      ],
      ['content.between' => '亲！请输入10~50个字的签到内容', 'mood.required' => '你好像忘记选择心情图片']
    );

    $sign->fill($request->input());
    $sign->user_id = Auth::id();
    $sign->site_id = site()['id'];
    $sign->save();

    return back()->with('success', '签到成功');
  }

  public function destroy(Sign $sign)
  {
    $sign->delete();
    return response()->json(['message' => '删除成功']);
  }
}
