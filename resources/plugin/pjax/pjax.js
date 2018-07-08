//pjax设置
$(document).pjax('a','#pjax-container');
$.pjax.defaults.timeout = 1200;
$(document).on('pjax:click', function() {
    $("#loading").show();
});
$(document).on('pjax:end', function() {
    $("#loading").hide();
});
