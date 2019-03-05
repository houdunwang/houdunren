define([
    'package/select2.min',
    'css!package/css/select2.min.css'
], function () {
    return function (el) {
        return $(el).select2();
    }
})