<?php

namespace App\Http\Controllers;

use App\Exceptions\ResponseHttpException;
use Illuminate\Http\Request;

/**
 * 系统安装
 * Class InstallController
 * @package App\Http\Controllers
 */
class InstallController extends Controller
{
    //安装首页
    public function index()
    {
        return view('install.index');
    }

    public function database()
    {
        return view('install.database');
    }

    public function connect(Request $request)
    {
        try {
            $host = $request->input('host');
            $db = $request->input('database');
            $user = $request->input('username');
            $pass = $request->input('password');
            new \PDO("mysql:host={$host};dbname={$db}", $user, $pass);
            put_contents_file(base_path('database.php'),
                ['host' => $host, 'database' => $db, 'username' => $user, 'password' => $pass]);
            return redirect()->route('install.migrate')->with('success', '数据库配置正确');
        } catch (\Exception $e) {
            return redirect(route('install.database'))->with('info', '数据为连接失败');
        }
    }

    public function migrate()
    {
        return view('install.migrate');
    }

    public function create()
    {
        try {
            if (\Schema::hasTable('migrations')) {
                \Artisan::call('module:migrate-reset');
                \Artisan::call('migrate:reset');
            }
            \Artisan::call('migrate', ['--seed' => null]);
            \Artisan::call('module:migrate');
            return redirect()->route('install.complete')->with('success', '数据表创建成功');
        } catch (\Exception $e) {
            throw new ResponseHttpException('数据表创建失败' . $e->getMessage());
        }
    }

    public function complete()
    {
        file_put_contents(base_path('install.lock'), 'The installation is complete');
        return view('install.complete');
    }
}
