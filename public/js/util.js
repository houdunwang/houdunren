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
/**
 * 为表单生成随机字符
 * @param name 表单名
 * @param len 字符长度
 */
function input_random(name, len) {
    require(['package/spark-md5.min'], function (md5) {
        let code = (new Date()).valueOf().toString();
        let hash = md5.hash(code) + md5.hash(code);
        $("[name=" + name + "]").val(hash.substr(0, len))
    });
}