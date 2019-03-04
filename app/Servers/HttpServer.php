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
     * @param $method
     * @param string $uri
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $uri = '', array $options = [])
    {
        try {
            return $this->client($uri)->request($method, $uri, $options);
        } catch (\Exception $e) {
            throw new \Exception('远程服务器请求失败');
        }
    }

    /**
     * 验证的HTTP请求
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authRequest(string $method, $uri = '', array $options = [])
    {
        $accessToken = Cloud::first()['access_token'] ?? '';
        $client = $this->client($uri);
        try {
            return $client->request($method, $uri,
                array_merge([
                    'headers' => ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . $accessToken,],
                    'http_errors' => true,
                ], $options));
        } catch (\Exception $e) {
            throw new \Exception('远程服务器请求失败');
        }
    }
}