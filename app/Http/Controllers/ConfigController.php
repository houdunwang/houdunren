<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['all', 'update']);
    }

    public function all()
    {
        $this->authorize('all', Config::class);
        return config('hd');
    }

    public function common()
    {
        $soft = config('hd.soft');
        return [
            'base' => config('hd.base'),
            'copyright' => config('hd.copyright'),
            'name' => config('hd.name'),
            "subscribe" => config('hd.subscribe'),
            'content' => config('hd.content'),
            'soft' => isSubscribe()  ? $soft : null,
        ];
    }

    public function update(Request $request)
    {
        $this->authorize('update', Config::class);
        Config::updateOrCreate(['id' => 1], ['data' => $request->input()]);
        return $this->respondOk('配置项保存成功');
    }
}
