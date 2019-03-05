//提交表单
define([
    'component/message',
    'hdjs',
    'axios',
    'lodash'
], function (Message, hdjs, axios,_) {
    return function (opt) {
        let options = $.extend({
            el: 'form',
            url: window.system ? window.system.url : '',
            data: '',
            successUrl: 'back',
            callback: '',
        }, opt);
        let data = options.data == '' ? $(options.el).serialize() : options.data;
        $('[type="submit"]').attr('disabled', 'disabled');
        $('button').attr('disabled','disabled');
        hdjs.loading(function(loadingBox){
            axios.post(options.url, data).then(function (response) {
                $('[type="submit"]').removeAttr('disabled');
                $('button').removeAttr('disabled');
                if (_.isObject(response.data)) {
                    if ($.isFunction(options.callback)) {
                        options.callback(response.data);
                    } else {
                        if (response.data.valid == 1) {
                            Message(response.data.message, options.successUrl, 'success');
                        } else {
                            Message(response.data.message, '', 'info');
                        }
                    }
                } else {
                    Message(response.data, '', 'error');
                }
                loadingBox.remove();
            }).catch(function (response) {
                Message(response, '', 'error');
            });
        });
    }
})
