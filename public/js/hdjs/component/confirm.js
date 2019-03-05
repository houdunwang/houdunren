define(['jquery', 'component/modal'], function ($, Modal) {
    return function (content, callback, options) {
        var content =
            '			<i class="pull-left fa fa-4x fa-info-circle text-secondary"></i>' +
            '			<div class="pull-left"><p>' + content + '</p>' +
            '			</div>' +
            '			<div class="clearfix"></div>';
        var modalobj = Modal($.extend({
            title: '系统提示',
            content: content,
            footer: '<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">取消</button>' +
            '<button type="button" class="btn btn-primary btn-sm confirm">确定</button>',
            events: {
                confirm: function () {
                    if ($.isFunction(callback)) {
                        modalobj.modal('hide');
                        callback();
                    }
                }
            }
        }, options));
        modalobj.find('.modal-content').addClass('alert');
        return modalobj;
    }
})
