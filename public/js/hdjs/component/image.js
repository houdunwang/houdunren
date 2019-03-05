define(['component/fileUploader', 'hdjs'], function (fileUploader, hdjs) {
    return function (callback, options) {
        //初始化参数数据mes
        options = options ? options : {};
        //初始化POST数据
        options.data = options.data ? options.data : {};
        let opts = $.extend({
            width: hdjs.isMobile() ? '95%' : 800,//宽度
            type: 'image',
            extensions: 'gif,jpg,jpeg,png',
            multiple: false,
            fileSizeLimit: 200 * 1024 * 1024,
            fileSingleSizeLimit: 2 * 1024 * 1024,
            compress: false,
            data: {},
            //后台上传处理地址
            uploader: ''
        }, options);
        fileUploader.show(function (images) {
            if (images.length > 0) {
                if ($.isFunction(callback)) {
                    callback(images);
                }
            }
        }, opts);
    }
})
