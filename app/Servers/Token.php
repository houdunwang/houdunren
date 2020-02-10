<?php

namespace App\Servers;

use App\Models\Site;
use App\User;
use GuzzleHttp\Client;

class Token
{
    private $http;

    public function __construct()
    {
        $host = 'http://hdcms.test/api';
        $this->http = new Client(['base_uri' => $host]);
    }
    public function get(string $username, string $password)
    {
        $this->http->post('/oauth/token', [
            'form_params' => [
                'grant_type' => '',
                'client_secret' => '',
                'client_id' => '',
                'username' => $username,
                'password' => $password,
            ]
        ]);
    }
    public function refresh()
    {
    }
}