//提交表单
define([
    'jquery',
    'component/message',
    'hdjs',
    'axios',
    'lodash'
], function ($,Message, hdjs, axios,_) {
    return function (opt) {
        let options = $.extend({
            type: 'post',
            url: window.system ? window.system.url : '',
            data: {},
            successUrl: 'back',
            callback: '',
        }, opt);
        let ax;
        switch (options.type) {
            case 'get':
                ax = axios.get(options.url, {params: options.data})
                break;
            case 'post':
                ax = axios.post(options.url, options.data)
                break;
        }
        hdjs.loading(function(loadingBox){
            ax.then(function (response) {
                if (_.isObject(response.data)) {
                    if ($.isFunction(options.callback)) {
                        options.callback(response.data);
                    } else {
                        if (response.data.code == 0) {
                            Message(response.data.message, options.successUrl, 'success');
                        } else {
                            Message(response.data.message, '', 'info');
                        }
                    }
                } else {
                    Message(response.data, '', 'error');
                }
            }).catch(function (response) {
                Message(response, '', 'error');
            });
            loadingBox.remove();
        });

        return false;
    }
})
