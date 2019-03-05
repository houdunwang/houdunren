//时间选择
define([
    'jquery',
    'package/jquery-clockpicker',
    'css!package/jquery-clockpicker.css'
], function ($) {
    return function (el, options) {
        return $(el).clockpicker(options);
    }
})