<?php

namespace App\Services;

class DouyinService
{
    // 支付
    public function pay($data)
    {
        $url = 'https://developer.toutiao.com/api/apps/ecpay/v1/create_order';
        $params['app_id'] = 'ttb71fc1a22820f2a401';
        $params['out_order_no'] = (string)$data['no'];
        $params['total_amount'] = (int)$data['amount'] * 100;
        $params['subject'] = 'subject';
        $params['body'] = 'body';
        $params['valid_time'] = 3600;
        $params['sign'] = $this->ttsign($params);
        $http = $this->httpPost($url, $params);
        return json_decode($http, true);
    }

    //curl
    public function httpPost($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if (!$data) return false;
        if (is_array($data)) {
            $data = json_encode($data);
        }
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length:' . strlen($data),
            'Cache-Control: no-cache',
            'Pragma: no-cache'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
    // 签名
    public function ttsign($params)
    {
        $rList = array();
        foreach ($params as $k => $v) {
            if ($k == "other_settle_params" || $k == "app_id" || $k == "sign" || $k == "thirdparty_id")
                continue;
            $value = trim(strval($v));
            $len = strlen($value);
            if ($len > 1 && substr($value, 0, 1) == "\"" && substr($value, $len, $len - 1) == "\"")
                $value = substr($value, 1, $len - 1);
            $value = trim($value);
            if ($value == "" || $value == "null")
                continue;
            array_push($rList, $value);
        }
        array_push($rList, "fregSFjXnAaSZmc02UGxLJWeDv9AX02F7YFxpji9");
        sort($rList, 2);
        return md5(implode('&', $rList));
    }
}
