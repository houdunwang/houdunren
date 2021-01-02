<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\System;
use Modules\Edu\Http\Requests\SystemRequest;

/**
 * 系统课程管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SystemController extends Controller
{
  public function index()
  {
    $lessons = System::latest()->paginate();
    return view('edu::admin.system.index', compact('lessons'));
  }

  public function create(System $system)
  {
    return view('edu::admin.system.create', compact('system'));
  }

  public function store(SystemRequest $request, System $system)
  {
    $system->fill($request->input());
    $system->user_id = user("id");
    $system->site_id = site()['id'];
    $system->save();

    $this->updateLesson($system, $request);

    return redirect()->route('Edu.admin.system.index')->with('success', '课程保存成功');
  }

  public function edit(System $system)
  {
    return view('edu::admin.system.edit', compact('system'));
  }

  public function update(SystemRequest $request, System $system)
  {
    $system->fill($request->input())->save();

    $this->updateLesson($system, $request);

    return redirect()->route('Edu.admin.system.index')->with('success', '课程保存成功');
  }

  protected function updateLesson($system, $request)
  {
    $system->lessons()->detach();
    $lessons = json_decode($request->lessons, true);

    foreach ($lessons as $rank => $lesson) {
      $system->lessons()->attach([$lesson['id'] => ['rank' => $rank]]);
    }
  }

  public function destroy(System $system)
  {
    $system->delete();
    return response()->json(['message' => '课程删除成功']);
  }
}
