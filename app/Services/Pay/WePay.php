<?php

namespace App\Services\Pay;

use Illuminate\Contracts\Container\BindingResolutionException;
use Yansongda\Pay\Gateways\Wechat;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Yansongda\Pay\Pay;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Exception;
use ReflectionException;

/**
 * 微信支付
 * @package App\Services\Pay
 */
class WePay
{
    protected $pay;

    public function __construct()
    {
        $this->init();
    }

    /**
     * 支付服务
     * @return void
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function init()
    {
        $config =  [
            'cert_client' => base_path('Modules') . '/' . module()['name'] . '/cert/' . SID . '/apiclient_cert.pem', // optional，退款等情况时用到
            'cert_key' => base_path('Modules') . '/' . module()['name'] . '/cert/' . SID . '/apiclient_key.pem', // optional，退款等情况时用到
            'notify_url' => route('pay.notify.notify', [MID, 'wepay']),
        ] + config('site.wepay');

        if (empty($config['mode'])) unset($config['mode']);
        $this->pay = Pay::wechat($config);
    }

    /**
     * 发起支付
     * @param array $order
     * @param string $type
     * @return string|void
     * @throws Exception
     * @throws ReflectionException
     */
    public function order(array $order, $type = "scan")
    {
        $payOrder['total_fee'] = $order['price'] * 100;
        $payOrder['out_trade_no'] = $order['sn'];
        $payOrder['body'] = $order['subject'];
        $result = $this->pay->$type($payOrder);

        switch ($type) {
            case 'scan':
                //显示支付二维码
                $result = Builder::create()
                    ->writer(new PngWriter())
                    ->writerOptions([])
                    ->data($result->code_url)
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                    ->size(300)
                    ->margin(10)
                    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->labelText('')
                    ->labelFont(new NotoSans(20))
                    ->labelAlignment(new LabelAlignmentCenter())
                    ->build();
                return $result->getDataUri();
        }
    }

    /**
     * 支付网关用于支付身份验证等
     * @return mixed
     */
    public function gatway()
    {
        return $this->pay;
    }
}
