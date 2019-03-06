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
     * 刷新TOKEN
     * @param $refreshToken
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken($refreshToken)
    {
        $oauthClient = \DB::table('oauth_clients')->where(['password_client' => 1,])->first();
        $response = $this->request('POST', 'oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'client_id' => $oauthClient->id ?? 0,
                'client_secret' => $oauthClient->secret ?? 0,
                'refresh_token' => $refreshToken,
            ],
        ]);
        return $response;
    }

    /**
     * 接口登录
     * @param array $user
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function token(array $user)
    {
        $oauthClient = \DB::table('oauth_clients')->where(['password_client' => 1,])->first();
        $response = $this->request('POST', 'oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $oauthClient->id ?? 0,
                'client_secret' => $oauthClient->secret ?? 0,
                'username' => $user['username'],
                'password' => $user['password'],
            ],
        ]);
        return $response;
    }

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
            throw new \Exception('远程服务器请求失败,请重新绑定云帐号');
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
            throw new \Exception('远程服务器请求失败,请重新绑定云帐号');
        }
    }
}