<?php
namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 配置管理
 * Class ConfigController
 * @package App\Http\Controllers\Edu
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-config');
    }

    public function edit()
    {
        return view('edu.config.edit');
    }

    public function update(Request $request)
    {
        config_save($request->except('_token', '_method'), 'edu');
        return redirect(route('edu.config.edit'))->with('success', '配置项修改成功');
    }
}
