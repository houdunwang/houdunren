define([
    'package/bootstrap-switch.min',
    'css!package/css/bootstrap-switch.min.css'
], function () {
    return function (el) {
        return $(el).bootstrapSwitch();
    }
})