define([
    'hdjs',
    'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js',
    'css!https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css'
], function (hdjs,SimpleMDE) {
    return {
        handle: function (el, options, callback) {
            //图片上传地址
            options  = options?options:{};
            options = Object.assign({
                spellChecker :false,
                autosave: {
                    enabled: false,
                    uniqueId: "createTopic",
                    delay: 1000,
                },
                autofocus: false,
                spellChecker: false,
                placeholder:'请使用 Markdown 语法输入内容，支持拖放与粘贴上传图片',
                showIcons: ["code", "table"],
                insertTexts: {
                    horizontalRule: ["", "\n\n-----\n\n"],
                    image: ["![](http://", ")"],
                    link: ["[", "](http://)"],
                    table: ["", "\n\n| Column1 | Column2 | Column3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
                },
            },options)
            options.element= $(el)[0];
            serverUrl= options.server?options.server:window.hdjs.uploader;
            let simplemde = new SimpleMDE(options);
            //粘贴上传
            $(".CodeMirror-wrap").on('paste', function (ev) {
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
                                    simplemde.value(simplemde.value()+"\n![aa](" + ret.file + ")");
                                }else{
                                    hdjs.message(ret.message)
                                }
                            });
                        };
                        var url = reader.readAsDataURL(blob);
                    }
                }
            });
            //拖放图片上传
            simplemde.codemirror.on("update", function(){
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
                            simplemde.value(simplemde.value()+"\n![aa](" + data.file + ")");
                            callback(data);
                        },
                        complete: function (data) {
                        }
                    });

                    return false;
                }
            });
            if ($.isFunction(callback)) {
                callback(simplemde);
            }
        }
    };
});