/**
 * 选择用户
 * @param callback 回调方法
 * @param id 排除的会员编号
 */
function user(callback, id) {
    require(['hdjs'], function (hdjs) {
        var url = '/common/user/search?id=' + id;
        hdjs.modal({
            title: '选择用户',
            content: '<iframe src="' + url + '" frameborder="0" width="100%" style="height:550px;"></iframe>',
            width: 800
        });
    });
    window.selectUser = function (id) {
        callback(id);
        $("#hdMessage").modal('hide');
    };
}

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