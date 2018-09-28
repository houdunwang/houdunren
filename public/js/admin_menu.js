require(['hdjs', 'jquery'], function (hdjs, $) {
    $("ul.flex-column li.nav-item a.nav-link").click(function () {
        let menu = $(this).parent().parent().parent().parent();
        hdjs.cookie(function (Cookie) {
            Cookie.set('admin_menu_id', menu.attr('menu'));
        })
        setTimeout(() => {
            location.href = $(this).attr('href');
        }, 500);
        return false;
    });
});
