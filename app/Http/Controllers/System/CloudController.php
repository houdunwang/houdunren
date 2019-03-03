<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\System;

use App\Models\Cloud;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 云帐号绑定
 * Class CloudController
 * @package App\Http\Controllers\System
 */
class CloudController extends Controller
{
    protected $host;

    public function __construct()
    {
        $this->host = Cloud::find(1)['api_host'] ?? config('app.api_host');
    }

    public function create()
    {
        return view('system.cloud.create', compact('status'));
    }

    /**
     * 获取token
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->host . '/api/token',
                ['form_params' => $request->only(['username', 'password'])]);
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            Cloud::find(1)->update($data);
            return back()->with('success', '服务器帐号绑定成功');
        } catch (\Exception $exception) {
            return back()->with('info', '帐号或密码错误');
        }
    }

    protected function refreshToken(): bool
    {
        if ($refreshToken = Cloud::find(1)['refresh_token']) {
            try {
                $client = new Client();
                $response = $client->request('PUT', $this->host . '/api/token',
                    ['form_params' => ['refresh_token' => $refreshToken]]);
                $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
                Cloud::find(1)->update($data);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }
}
