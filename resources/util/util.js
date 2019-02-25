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