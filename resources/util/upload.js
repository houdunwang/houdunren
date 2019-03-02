/**
 * 上传图片
 * @param name 表单名称
 */
function uploadImage(name) {
    require(['hdjs'], function (hdjs) {
        hdjs.image(function (images) {
            $("[name=" + name + "]").val(images[0]);
            $("[name=" + name + "]").parent().parent().find('img').attr('src', images[0]);
        })
    });
}

/**
 * 上传文件
 * @param name 表单名称
 * @param type
 */
function uploadFile(name, type) {
    type = type ? type : system.upload.type
    require(['hdjs'], function (hdjs) {
        let options = {
            extensions: type,
            fileSingleSizeLimit: system.upload.file_size
        };
        hdjs.file(function (files) {
            $("[name=" + name + "]").val(files[0]);
        }, options)
    });
}