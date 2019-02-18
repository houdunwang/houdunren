define(['hdjs'], function (hdjs) {
    return {
        //选择用户
        user: function (callback,id) {
            require(['hdjs'], function (hdjs) {
                var url = '/common/user/search?id='+id;
                hdjs.modal({
                    title: '选择用户',
                    content: '<iframe src="'+url+'" frameborder="0" width="100%" style="height:550px;"></iframe>',
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