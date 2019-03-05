define(['component/message', 'jquery', 'lodash'], function (Message, $, _) {
    return function (option) {
        option = $.extend({
            //后台发送地址
            url: '',
            //发送间隔时间
            timeout: 60,
            data: {},
            //发送前执行的动作
            before: function () {
                return true;
            }
        }, option);
        //上次发送的时间
        let obj = {
            //按钮
            el: $(option.el),
            //定时器编号
            intervalId: 0,
            //初始化
            init: function () {
                let This = this;
                this.el.on('click', function () {
                    This.send();
                });
                this.update();
            },
            //更改状态
            update: function () {
                let This = this;
                This.intervalId = setInterval(function () {
                    if (This.getWaitTime() > option.timeout) {
                        clearInterval(This.intervalId);
                        This.el.removeAttr('disabled').text('发送验证码');
                    } else {
                        let diff = option.timeout - This.getWaitTime();
                        This.el.text(diff + "秒后再发送").attr('disabled', 'disabled');
                    }
                }, 100);
            },
            //发送验证码
            send: function () {
                let This = this;
                let username = $.trim($(option.input).val());
                //验证手机号或邮箱
                if (!/^\d{11}$/.test(username) && !/^.+@.+$/.test(username)) {
                    Message('发送帐号错误', '', '');
                    return;
                }
                if (option.before() === true) {
                    This.setSendTime();
                    option.data.username = username;
                    $.post(option.url, option.data, function (response) {
                        Message(response.message);
                        if (response.code == 0) {
                            This.setSendTime();
                            This.update();
                        }
                    }, 'json');
                }
            },
            //获取发送间隔时间
            getWaitTime: function () {
                let time = localStorage.getItem('validCodeSendTime');
                let diff = $.now() * 1 - (time * 1);
                return Math.floor(diff / 1000);
            },
            //设置间隔时间
            setSendTime: function () {
                localStorage.setItem('validCodeSendTime', $.now());
            }
        }
        obj.init();
    }
})
