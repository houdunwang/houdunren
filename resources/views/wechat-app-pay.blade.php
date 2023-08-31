<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://res2.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
</head>

<body>
    <script>
        //公众号支付
        wx.config({
            debug: false,
            appId: "{{$res['appId']}}", // 必填，公众号的唯一标识
            timestamp: "{{$res['timeStamp']}}", // 必填，生成签名的时间戳
            nonceStr: "{{$res['nonceStr']}}", // 必填，生成签名的随机串
            signature: "{{$res['paySign']}}", // 必填，签名
            jsApiList: ['chooseWXPay'], // 必填，需要使用的 JS 接口列表
        })

        wx.chooseWXPay({
            timestamp: "{{$res['timeStamp']}}", // 支付签名时间戳，注意微信 jssdk 中的所有使用 timestamp 字段均为小写。但最新版的支付后台生成签名使用的 timeStamp 字段名需大写其中的 S 字符
            nonceStr: "{{$res['nonceStr']}}", // 支付签名随机串，不长于 32 位
            package: "{{$res['package']}}", // 统一支付接口返回的 prepay_id 参数值，提交格式如：prepay_id=\*\*\*）
            signType: 'RSA', // 微信支付V3的传入 RSA ,微信支付V2的传入格式与V2统一下单的签名格式保持一致
            paySign: "{{$res['paySign']}}", // 支付签名
            success: function(res) {
                console.log('ok=>', res)
                alert('订阅成功')
                // location.href = '/'
            },
            fail: function(res) {
                console.log('error=>', res)
            }
        })
    </script>
</body>

</html>
