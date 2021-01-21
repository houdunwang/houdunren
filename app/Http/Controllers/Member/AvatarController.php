<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class AvatarController extends Controller
{
    public function index()
    {
        return view('member.avatar.index');
    }

    public function store(Request $request)
    {
        $user = user();
        $user['avatar'] = $request->input('avatar');
        $user->save();

        return back()->with('success', '头像修改成功');
    }

    public function upload(Request $request, UploadService $UploadService)
    {
        $request->validate(['file' => ['required', 'mimes:jpeg,png', 'max:2000']]);

        $path = $request->file('file')->getRealPath();

        Image::load($path)
            ->crop(Manipulations::CROP_TOP_RIGHT, 200, 200)
            ->save();
        $url = $UploadService->make($request->file);
        return response()->json(['path' => $url]);
    }
}
