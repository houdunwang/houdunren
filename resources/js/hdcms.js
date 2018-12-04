require(['jquery'], function ($) {
    $("form").submit(function () {
        $("button[type='submit']").attr('disabled', true);
    });
});
