$(".sidebar-elements li.parent").click(function () {
    //当前菜单在li.parent序号
    let i =  $('.sidebar-elements li.parent').index(this);
    sessionStorage.setItem('current_menu_index',i);
});
let currentMenuIndex = sessionStorage.getItem('current_menu_index');
if(currentMenuIndex){
    $(".sidebar-elements li.parent").eq(currentMenuIndex).addClass('open');
}
