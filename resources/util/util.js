define(['hdjs'], function (hdjs) {
    return {
        //选择用户
        user: function (callback) {
            require(['hdjs'], function (hdjs) {
                hdjs.modal({
                    title: '选择用户',
                    content: '<iframe src="/common/user/search" frameborder="0" width="100%" style="height:550px;"></iframe>',
                    width: 800
                });
            });
            window.selectUser = function (id) {
                callback(id);
                $("#hdMessage").modal('hide');
            };
        }
    }
});