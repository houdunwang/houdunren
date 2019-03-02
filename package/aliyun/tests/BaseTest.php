<?php

class BaseTest extends \PHPUnit\Framework\TestCase
{
    protected $data;
    protected $config;

    public function setUp()
    {
        parent::setUp();
        date_default_timezone_set('Asia/Shanghai');
        $this->config = include __DIR__ . '/config.php';
        Houdunwang\Aliyun\Aliyun::config($this->config);
    }

    //直播推流
    public function testPushLive()
    {
        $url = 'rtmp://video-center.alivecdn.com/houdunren/app?vhost=live.houdunren.com';
        $url = \houdunwang\aliyun\Aliyun::instance('Live')->url($url, 'houdunwangaaa', 5);
        $this->assertTrue(strpos($url, 'rtmp') !== false);
    }

    //测试邮件
    public function testSendMail()
    {
        //阿里云请求实例
        $request = new \Dm\Request\V20151123\SingleSendMailRequest();
        //控制台创建的发信地址
        $request->setAccountName("edu@vip.houdunren.com");
        //发信人昵称
        $request->setFromAlias("后盾向军");
        $request->setAddressType(1);
        $request->setTagName("控制台创建的标签");
        $request->setReplyToAddress("true");
        $request->setToAddress("2300071698@qq.com");
        $request->setSubject("邮件主题-后盾人");
        $request->setHtmlBody("邮件正文-后盾人 人人做后盾");

        try {
            //发送请求
            $response = \Houdunwang\Aliyun\Aliyun::client()->getAcsResponse($request);
            $this->assertObjectHasAttribute('RequestId', $response);
        } catch (ClientException  $e) {
            print_r($e->getErrorCode());
            print_r($e->getErrorMessage());
        } catch (ServerException  $e) {
            print_r($e->getErrorCode());
            print_r($e->getErrorMessage());
        }
    }

    //发送短信
    public function testSendSms()
    {
        $data = [
            //短信签名
            'sign'     => '后盾网',
            //短信模板
            'template' => 'SMS_12840367',
            //手机号
            'mobile'   => $this->config['mobile'],
            //模板变量
            'vars'     => ["code" => "8888", "product" => "hdphp"],
        ];
        $res = Houdunwang\Aliyun\Aliyun::instance('Sms')->send($data);
        $this->assertObjectHasAttribute('RequestId', $res);
    }
}
