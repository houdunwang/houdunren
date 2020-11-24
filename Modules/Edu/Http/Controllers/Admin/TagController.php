<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Tag;

/**
 * 标签管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class TagController extends Controller
{
  public function edit()
  {
    $tags = Tag::all();
    return view('edu::admin.tag.edit', compact('tags'));
  }

  public function update(Request $request)
  {
    Tag::whereNotIn('id', $request->ids)->delete();

    foreach ($request->input('tags') as $index => $title) {
      if ($title && !Tag::where('title', $title)->exists()) {
        Tag::updateOrCreate(['id' => $request->ids[$index]], [
          'title' => $title,
          'site_id' => site()['id'],
          'id' => $request->ids[$index]
        ]);
      }
    }
    return back()->with('success', '标签保存成功');
  }
}
