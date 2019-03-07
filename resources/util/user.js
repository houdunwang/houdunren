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
