<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\Cloud;
use GuzzleHttp\Client;

/**
 * 发送远程请求
 * Class HttpServer
 * @package App\Servers
 */
class HttpServer
{
    /**
     * HTTP实例
     * @param string $uri
     * @return Client
     */
    public function client(string $uri)
    {
        $config = [];
        if (!preg_match('@http(s?)://@', $uri)) {
            $config = [
                'base_uri' => Cloud::find(1)['api_host'] ?? config('app.api_host'),
                'timeout' => 0,
            ];
        }

        return new Client($config);
    }

    /**
     * 不需要验证的HTTP请求
     * @param string $method 请求类型
     * @param string $uri 请求地址不以http开始时添加应用商城地址前缀
     * @param array $options 参数选项
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $uri = '', array $options = [])
    {
        return $this->client($uri)->request($method, $uri, $options);
    }

    /**
     * 验证的HTTP请求
     * @param string $method 请求类型
     * @param string $uri 请求地址不以http开始时添加应用商城地址前缀
     * @param array $options 参数选项
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authRequest(string $method, $uri = '', array $options = [])
    {
        $accessToken = Cloud::first()['access_token'] ?? '';
        return $this->client($uri)->request($method, $uri,
            array_merge([
                'headers' => ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . $accessToken,],
            ], $options));
    }
}