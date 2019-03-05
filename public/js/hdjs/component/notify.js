//消息通知
define([
    'jquery',
    'package/bootstrap-notify.min',
], function ($) {
    return function (options, settings) {
        return $.notify(options, settings);
    }
})