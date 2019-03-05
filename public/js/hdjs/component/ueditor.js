define(['hdjs','ZeroClipboard', 'jquery',
    'component/fileUploader',
    'ueditor',
    'css!less/ueditor.css'
], function (hdjs,ZeroClipboard, $, fileUploader) {
    return function (id, opt, callback, buttons) {
        window['ZeroClipboard'] = ZeroClipboard;
        var options = $.extend({
            UEDITOR_HOME_URL: window.hdjs.base + '/package/ueditor/',
            serverUrl: window.hdjs.ueditor,
            'elementPathEnabled': false,
            // 'initialFrameHeight': 200,
            'focus': false,
            'maximumWords': 9999999999999,
            'autoClearinitialContent': false,
            'toolbars': [[
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough',
                'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor',
                'backcolor', 'hdimage', 'insertorderedlist', 'insertunorderedlist', 'selectall', '|',
                 'paragraph', 'fontfamily', 'fontsize', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
                'link', 'emotion', 'map','|',
                'inserttable', 'deletetable'
            ]],
            autoHeightEnabled: false,//自动增高
            autoFloatEnabled: false,
        }, opt);
        var editor = UE.getEditor(id, options);
        UE.commands['hdimage'] = {
            execCommand: function (cmdName, align) {
                var This = this;
                fileUploader.show(function (imgs) {
                    if (imgs.length > 0) {
                        var imglist = [];
                        for (i in imgs) {
                            imglist.push({
                                'src': imgs[i],
                                'max-width': '100%',
                            });
                        }
                        This.execCommand('insertimage', imglist);
                    }
                }, {type: 'image', multiple: true, extensions: 'gif,jpg,jpeg,bmp,png',width:'800px',data:{csrf_token:''}});
            }
        };
        if ($.isFunction(callback)) {
            return callback(editor);
        }
        return editor;
    }
})