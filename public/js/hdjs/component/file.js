define(['component/fileUploader', 'hdjs'], function (fileUploader, hdjs) {
    return function (callback, options) {
        //初始化参数数据
        options = options ? options : {};
        //初始化POST数据
        options.data = options.data ? options.data : {};
        let opts = $.extend({
            width: hdjs.isMobile() ? '95%' : 700,//宽度
            type: 'file',
            extensions: 'doc,ppt,wps,zip,txt,jpg,jpeg,png,gif',
            multiple: false,
            fileSizeLimit: 200 * 1024 * 1024,
            fileSingleSizeLimit: 5 * 1024 * 1024,
            data: {},
            server: ''
        }, options);
        fileUploader.show(function (files) {
            if (files) {
                if ($.isFunction(callback)) {
                    callback(files);
                }
            }
        }, opts);
    }
})
