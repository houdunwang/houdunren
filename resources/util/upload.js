/**
 * 上传图片
 * @param name 表单名称
 */
function upload_image(name) {
    require(['hdjs'], function (hdjs) {
        hdjs.image(function (images) {
            $("[name=" + name + "]").val(images[0]);
            $("[name=" + name + "]").parent().parent().find('img').attr('src',  images[0]);
        })
    });
}

/**
 * 上传文件
 * @param name 表单名
 * @param type 文件类型
 * @param options 选项
 */
function upload_file(name, type, options) {
    type = type ? type : system.upload.type;
    options = options ? options : {};
    require(['hdjs'], function (hdjs) {
        options = $.extend({
            extensions: type,
            fileSingleSizeLimit: system.upload.file_size
        }, options);
        hdjs.file(function (files) {
            $("[name=" + name + "]").val(files[0]);
        }, options)
    });
}