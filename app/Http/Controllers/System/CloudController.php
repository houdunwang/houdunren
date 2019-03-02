<?php
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

    public function create()
    {
        $this->host = Cloud::find(1)['api_host'] ?? config('app.api_host') . '/app';
        return view('system.cloud.create');
    }

    /**
     * 获取token
     * @param Request $request
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', $this->host . '/auth');
    }
}
