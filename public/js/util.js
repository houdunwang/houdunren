/**
 * 选择用户
 * @param callback 回调方法
 * @param id 排除的会员编号
 */
function site_user(callback, id) {
    require(['hdjs'], function (hdjs) {
        let url = '/site/'+window.sid+'/user_search?id=' + id;
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

/**
 * 删除事件
 * @param bt 按钮
 * @param message 提示消息
 */
function destroy(bt, message) {
    message = message ? message : '确定删除吗？';
    require(['hdjs'], function (hdjs) {
        hdjs.confirm(message, function () {
            $(bt).prev('form').submit();
        });
    })
}

/**
 * 发送验证码
 * @param btId
 * @param inputName
 */
function send_code(btId, inputName) {
    require(['hdjs', 'bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: btId,
            //后台链接
            url: '/member/send/code',
            //验证码等待发送时间
            timeout: window.system.message_timeout,
            //表单，手机号或邮箱的INPUT表单
            input: inputName
        };
        hdjs.validCode(option);
    })
}

/**
 * 异步POST请求
 * @param action
 * @param data
 */
function ajax_post_request(action, data) {
    require(['axios', 'hdjs'], function (axios, hdjs) {
        axios.post(action, data).then(function (response) {
            hdjs.swal({
                text: response.data.message,
                button: false,
                icon: 'success'
            });
        }).catch(function (error) {
            hdjs.swal({
                text: error.response.data.message,
                button: false,
                icon: 'warning'
            });
        })
    });
}

/**
 * 异步GET请求
 * @param action
 * @param data
 */
function ajax_get_request(action, data) {
    require(['axios', 'hdjs'], function (axios, hdjs) {
        axios.get(action, {params: data}).then(function (response) {
            hdjs.swal({
                text: response.data.message,
                button: false,
                icon: 'success'
            });
        }).catch(function (error) {
            hdjs.swal({
                text: error.response.data.message,
                button: false,
                icon: 'warning'
            });
        })
    });
}