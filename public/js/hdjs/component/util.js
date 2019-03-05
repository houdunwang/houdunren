//工具函数
define([
    'spark-md5'
], function (md5) {
    return {
        //移动端检测
        isMobile: function () {
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = false;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) {
                    flag = true;
                    break;
                }
            }
            return flag;
        },
    }
})