require(['hdjs', 'jquery'], function (hdjs, $) {
    //上次点击的元素显示子菜单
    let pos = sessionStorage.getItem('admin_menu_pos');
    $('.top:eq(' + pos + ')').find('.collapse').addClass('show');

    //只展开当前点击的主菜单
    $(".top").click(function () {
        $('.top .collapse').removeClass('show');
    })

    //记录当前点击的主菜单
    $("#sidebarCollapse .nav-sm .nav-item a").click(function () {
        let pos = $(this).parents('.top').eq(0).index('.top');
        sessionStorage.setItem('admin_menu_pos', pos);
    });
})
