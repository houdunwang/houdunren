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