//pjax设置
$(document).pjax('a[pjax]','#pjax-container',{
    timeout:1200,
    maxCacheLength:-1
});
$(document).on('pjax:click', function() {
    $("#loading").show();
});
$(document).on('pjax:end', function() {
    $("#loading").hide();
});
