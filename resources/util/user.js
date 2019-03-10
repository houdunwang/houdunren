/**
 * 选择用户
 * @param callback 回调方法
 * @param id 排除的会员编号
 */
function site_user(callback, id) {
    require(['hdjs'], function (hdjs) {
        let url = '/site/' + window.sid + '/user_search?id=' + id;
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
 * 会员登录
 * 依赖 comments/login.blade.php
 * @returns {boolean}
 */
function user_login() {
    if (!window.user_id) {
        require(['hdjs', 'axios', 'bootstrap'], function (hdjs, axios) {
            $('#loginModal').modal('show');
            $('#loginForm').submit(function () {
                axios.post("/login", $("#loginForm").serialize()).then(function (response) {
                    window.user_id = response.data.user_id;
                    $('#loginModal').modal('hide');
                    hdjs.swal({text: "登录成功", button: false, icon: 'success', 'timer': 1000});
                }).catch(function (error) {
                    hdjs.swal({
                        text: error.response.data.message, button: false, icon: 'error', timer: 1000
                    });
                });
                return false;
            });
        });
        return false;
    }
    return true;
}
