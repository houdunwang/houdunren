require(['hdjs', 'jquery'], function (hdjs, $) {
    $("#sidebarCollapse .top").click(function (event) {
        // event.stopPropagation();
        //记住点击的菜单ID
        let id = $(this).find('.collapse').attr('id');
        //移除原有菜单
        $("#sidebarCollapse .top .collapse").removeClass('show');
        hdjs.cookie(function (Cookie) {
            Cookie.set('admin_menu_id', id);
        })
    })
    //防止点击菜单链接时页面抖动
    $("#sidebarCollapse .top .collapse li").click(function (event) {
        event.stopPropagation();
    })
})
