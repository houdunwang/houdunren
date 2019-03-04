<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\System;

use App\Exceptions\ResponseHttpException;
use App\Models\Cloud;
use App\Servers\HttpServer;
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
    public function create()
    {
        return view('system.cloud.create', compact('status'));
    }
    /**
     * 获取token
     * @param Request $request
     * @param HttpServer $httpServer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request, HttpServer $httpServer)
    {
        try {
            $response = $httpServer->request('POST', 'api/token',
                ['form_params' => $request->only(['username', 'password'])]);
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            Cloud::find(1)->update($data);
            return back()->with('success', '服务器帐号绑定成功');
        } catch (\Exception $exception) {
            return back()->with('info', '帐号或密码错误');
        }
    }

    /**
     * 刷新TOKEN
     * @param HttpServer $httpServer
     * @return \Illuminate\Http\RedirectResponse
     * @throws ResponseHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken(HttpServer $httpServer)
    {
        try {
            $refreshToken = Cloud::find(1)['refresh_token'];
            $response = $httpServer->request('PUT', 'api/token',
                ['form_params' => ['refresh_token' => $refreshToken]]);
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            Cloud::find(1)->update($data);
            return back()->with('success', '令牌刷新成功');
        } catch (\Exception $e) {
            throw new ResponseHttpException('令牌刷新失败，请尝试重新登录获取');
        }
    }
}
