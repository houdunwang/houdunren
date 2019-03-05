//cookie操作
define(['package/js.cookie.min'], function (Cookie) {
    return function (callback) {
        callback(Cookie);
    }
});