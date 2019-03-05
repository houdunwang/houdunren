define(["hdjs", "jquery"], function (hdjs, $) {
    return {
        markdown: function (elem, options) {
            //图片上传地址
            serverUrl= options.server?options.server:window.hdjs.uploader;
            require([
                "editormd",
                "package/editor.md/languages/zh-tw",
                "package/editor.md/plugins/link-dialog/link-dialog",
                "package/editor.md/plugins/reference-link-dialog/reference-link-dialog",
                "package/editor.md/plugins/image-dialog/image-dialog",
                "package/editor.md/plugins/code-block-dialog/code-block-dialog",
                "package/editor.md/plugins/table-dialog/table-dialog",
                "package/editor.md/plugins/emoji-dialog/emoji-dialog",
                "package/editor.md/plugins/goto-line-dialog/goto-line-dialog",
                "package/editor.md/plugins/help-dialog/help-dialog",
                "package/editor.md/plugins/html-entities-dialog/html-entities-dialog",
                "package/editor.md/plugins/preformatted-text-dialog/preformatted-text-dialog"
            ], function (editormd) {
                options = $.extend({
                    syncScrolling: "single",
                    path: window.hdjs.base + "/package/editor.md/lib/",
                    width: "100%",
                    height: 500,
                    toolbarAutoFixed: false,
                    saveHTMLToTextarea: true,
                    flowChart: true,
                    sequenceDiagram: true,

                    toolbarIcons: function () {
                        return [
                            "undo", "redo", "|",
                            "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                            "h1", "h2", "h3", "h4", "h5", "h6", "|",
                            "list-ul", "list-ol", "hr", "|",
                            "link", "reference-link", "hdimage", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                            "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|",
                            "help"
                        ]
                    },
                    // toolbarIcons : "full", // You can also use editormd.toolbarModes[name] default list, values: full, simple, mini.
                    toolbarIconsClass: {
                        hdimage: "fa-picture-o"  // 指定一个FontAawsome的图标类
                    },
                    // 自定义工具栏按钮的事件处理
                    toolbarHandlers: {
                        /**
                         * @param {Object}      cm         CodeMirror对象
                         * @param {Object}      icon       图标按钮jQuery元素对象
                         * @param {Object}      cursor     CodeMirror的光标对象，可获取光标所在行和位置
                         * @param {String}      selection  编辑器选中的文本
                         */
                        hdimage: function (cm, icon, cursor, selection) {
                            hdjs.image(function (images) {
                                $(images).each(function (k, v) {
                                    var str = '![](' + v + ')';
                                    cm.replaceSelection(str);
                                })
                            }, {
                                //上传多图
                                multiple: true,
                            })
                        }
                    },
                    lang: {
                        toolbar: {
                            hdimage: "图片上传",
                        }
                    },

                    onload: function () {
                        //拖放上传
                        var codeEditor = $(".CodeMirror-wrap")[0];
                        codeEditor.ondragenter = function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        };
                        codeEditor.ondragover = function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        };
                        codeEditor.ondrop = function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var files = e.dataTransfer.files // 这里获取到用户拖放的文件
                            // 其中 ajaxUpload是Ajax上传文件的函数
                            // uploadUrl是后端提供的上传地址, uploadCallback是上传后的回调函数，用于生成代码片段并插入编辑器
                            ajaxUpload(serverUrl, files, function (data) {
                            });
                            return false;
                        }

                        function ajaxUpload(uploadUrl, files, callback) {
                            var formData = new FormData();
                            formData.append('file', files[0]);
                            // 可以添加其他需要传给后端的参数
                            $.ajax({
                                url: uploadUrl,
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: 'json',
                                success: function (data) {
                                    md.insertValue("\n![aa](" + data.file + ")");
                                    callback(data);
                                },
                                complete: function (data) {
                                }
                            });

                            return false;
                        }
                    }
                }, options);
                let md = editormd(elem, options);
                window[elem] = md;
                if ($.isFunction(options.callback)) {
                    options.callback(md);
                }
                /**
                 * 粘贴上传图片
                 */
                $("#" + elem).on('paste', function (ev) {
                    var data = ev.clipboardData;
                    var items = (event.clipboardData || event.originalEvent.clipboardData).items;
                    for (var index in items) {
                        var item = items[index];
                        if (item.kind === 'file') {
                            var blob = item.getAsFile();
                            var reader = new FileReader();
                            reader.onload = function (event) {
                                var base64 = event.target.result;
                                //ajax上传图片
                                $.post(serverUrl, {file: base64}, function (ret) {
                                    if (ret.code === 0) {
                                        //新一行的图片显示
                                        md.insertValue("\n![aa](" + ret.file + ")");
                                    }else{
                                        hdjs.message(ret.message)
                                    }
                                });
                            };
                            var url = reader.readAsDataURL(blob);
                        }
                    }
                });

            })
        },
        markdownToHTML: function (elem, options) {
            require(['editormd'], function (editormd) {
                options = $.extend({
                    htmlDecode: "style,script,iframe",  // you can filter tags decode
                    emoji: true,
                    taskList: true,
                    tex: true,  // 默认不解析
                    flowChart: true,  // 默认不解析
                    sequenceDiagram: true,  // 默认不解析
                }, options);
                return editormd.markdownToHTML(elem, {
                    htmlDecode: "style,script,iframe",  // you can filter tags decode
                    emoji: true,
                    taskList: true,
                    tex: true,  // 默认不解析
                    flowChart: true,  // 默认不解析
                    sequenceDiagram: true,  // 默认不解析
                });
            })
        }
    }
});
