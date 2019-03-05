//日期时间选择
define([
    'package/jquery.datetimepicker.full',
    'css!package/css/jquery.datetimepicker.min.css',
], function () {
    return function (el, options) {
        jQuery.datetimepicker.setLocale('zh');
        jQuery(el).datetimepicker(options);
    }
})