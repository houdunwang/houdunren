//生成二维码
define([
    'jquery',
    'package/jquery.qrcode.min'
], function ($) {
    return function (el, text) {
        return $(el).qrcode(text);
        var canvas = $(el)[0];
        QRCode.toCanvas(canvas, text, function (error) {
            if (error) console.error(error)
        })
    }
});
