<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\AliPay;

require_once __DIR__ . '/Org/pagepay/service/AlipayTradeService.php';
require_once __DIR__ . '/Org/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

/**
 * 支付宝
 * Class AliPay
 * @package Houdunwang\Alipay
 */
class AliPay
{
    /**
     * 配置
     * @var array
     */
    protected $config = [];

    /**
     * 设置配置项
     * @param array $config
     * @return $this
     */
    public function config(array $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * 获取配置项
     * @param string|null $name
     * @return mixed
     */
    public function getConfig(string $name = null)
    {
        return $name ? array_get($this->config, $name) : $this->config;
    }

    /**
     * 签名验证|支付宝通知时的签名验证,验证通过后才可以更新定单信息
     * @return bool
     * @throws \Exception
     */
    public function signCheck()
    {
        $aliPayService = new \AlipayTradeService($this->getConfig());
        return $aliPayService->check($_REQUEST);
    }

    /**
     * 桌面支付
     * @param $data
     * @return bool|mixed|\SimpleXMLElement|string|\提交表单HTML文本
     * @throws \Exception
     */
    public function pagePay($data)
    {
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = trim($data['WIDout_trade_no']);
        //订单名称，必填
        $subject = trim($data['WIDsubject']);
        //付款金额，必填
        $total_amount = trim($data['WIDtotal_amount']);
        //商品描述，可空
        $body = trim($data['WIDbody']);
        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $aop = new \AlipayTradeService($this->config);
        /**
         * pagePay 电脑网站支付请求
         * @param $builder    业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response =  $aop->pagePay(
            $payRequestBuilder, $this->getConfig('return_url'),
            $this->getConfig('notify_url'));
        //输出表单
        var_dump($response);
    }
}