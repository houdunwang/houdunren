define(['jquery', 'lodash'], function ($, _) {
    return {
        //百度编辑器
        ueditor: function (id, opt, callback, buttons) {
            require(['component/ueditor'], function (ueditor) {
                ueditor(id, opt, callback, buttons);
            })
        },
        simditor: function (options) {
            require(['lodash', 'simditor', 'simditor-fullscreen', 'marked', 'to-markdown', 'simditor-dropzone',
                'simditor-markdown'], function (_, Simditor) {
                opt = _.merge({
                    spellChecker: false,
                    pasteImage: true,
                    locale: 'zh-CN',
                    // markdown: true,
                    toolbar: [
                        'title',
                        'bold',
                        'italic',
                        'fontScale',
                        'color',
                        'ol',
                        'ul',
                        'blockquote',
                        'code',
                        'table',
                        'link',
                        'image',
                        'hr',
                        'fullscreen',
                    ]
                }, options);
                new Simditor(opt);
            })
        },
        editormd: function (el, options) {
            require(['component/editormd'], function (editorMd) {
                editorMd.markdown(el, options);
            })
        },
        //Markdown编辑器前台转为HTML
        markdownToHTML: function (el, options) {
            require(['component/editormd'], function (editorMd) {
                editorMd.markdownToHTML(el, options);
            })
        },
        simplemdeMarkdownEditor: (el,options,callback) => {
            require(['component/simplemdeMarkdownEditor'], function (editormd) {
                editormd.handle(el, options,callback);
            })
        },
        tuiEditor: (el,options,callback) => {
            require(['component/tuiEditor'], function (editormd) {
                editormd.handle(el, options,callback);
            })
        },
        //SweetAlert
        swal: function (title, content, type) {
            require(['package/sweetalert.min', 'lodash'], function (swal, _) {
                if (_.isObject(title)) {
                    swal(title)
                } else {
                    swal(title, content, type)
                }
            });
        },
        //模态框
        modal: function (options, callback) {
            require(['component/modal'], function (modal) {
                modal(options, callback);
            })
        },
        //提示消息
        message: function (msg, redirect, type, timeout, options) {
            require(['component/message'], function (message) {
                message(msg, redirect, type, timeout, options);
            })
        },
        info: function (msg) {
            this.swal({text: msg, button: false, icon: 'info'});
        },
        //确认消息框
        confirm: function (content, callback, options) {
            require(['component/confirm'], function (confirm) {
                confirm(content, callback, options);
            })
        },
        //确认消息框
        bootstrapswitch: function (el) {
            require(['component/bootstrapswitch'], function (bootstrapswitch) {
                bootstrapswitch(el);
            })
        },
        //确认消息框
        select2: function (el) {
            require(['component/select2'], function (select2) {
                select2(el);
            })
        },
        //文件选择框样式
        bootstrapfilestyle: function (el) {
            require(['component/bootstrapfilestyle'], function (bootstrapfilestyle) {
                bootstrapfilestyle(el);
            })
        },
        //图片上传
        image: function (callback, options) {
            require(['component/image'], function (image) {
                image(callback, options);
            })
        },
        scrollTo: function (container, elem, times, options) {
            options = options ? options : {};
            require(['scrollTo'], function () {
                $(container).scrollTo(elem, times, options);
            });
        },
        //文件上传
        file: function (callback, options) {
            require(['component/file'], function (file) {
                file(callback, options);
            })
        },
        //光标定位
        caret: function (el, pos) {
            require(['package/jquery.caret.min'], function () {
                if ($.isFunction(pos)) {
                    pos($(el).caret());
                } else {
                    $(el).caret(pos)
                }
            })
        },
        //图表
        chart: function (el, opt) {
            require(['component/chart'], function (chart) {
                chart(el, opt);
            })
        },
        //城市选择
        city: function (items, vals) {
            require(['component/city'], function (city) {
                city.render(items, vals);
            })
        },
        //剪贴版
        clipboard: function (elem, options, callback) {
            require(['component/clipboard'], function (clipboard) {
                clipboard(elem, options, callback);
            })
        },
        //消息通知
        notify: function (options, settings) {
            require(['component/notify'], function (notify) {
                notify(options, settings);
            })
        },
        //时间选择
        clockpicker: function (el, options) {
            require(['component/clockpicker'], function (clockpicker) {
                clockpicker(el, options);
            })
        },
        //异步提交
        ajax: function (opt) {
            require(['component/ajax'], function (ajax) {
                ajax(opt);
            })
        },
        //预览图片
        preview: function (url, option) {
            option = option ? option : {};
            let opt = $.extend({
                title: '图片预览',
                width: 700,
                height: 500,
                content: '<div style="text-align: center">' +
                    '<img style="max-width: 100%;" src="' + url + '"/>' +
                    '</div>'
            }, option);
            require(['component/modal'], function (modal) {
                modal(opt)
            })
        },
        //二维码
        qrcode: function (el, options) {
            require(['component/qrcode'], function (qrcode) {
                qrcode(el, options);
            })
        },
        //颜色选择
        colorpicker: function (el, options) {
            require(['component/colorpicker'], function (colorpicker) {
                colorpicker(el, options);
            })
        },
        //cookie操作
        cookie: function (callback) {
            require(['component/cookie'], function (cookie) {
                cookie(callback);
            })
        },
        //时间区间选择
        daterangepicker: function (options) {
            require(['component/daterangepicker'], function (daterangepicker) {
                daterangepicker(options);
            })
        },
        //列表框选择日期
        dateselect: function (elem, val) {
            require(['component/dateselect'], function (dateselect) {
                dateselect(elem, val);
            })
        },
        //列表框选择日期
        datetimepicker: function (elem, options) {
            require(['component/datetimepicker'], function (datetimepicker) {
                datetimepicker(elem, options);
            })
        },
        //表情选择
        emotion: function (options) {
            require(['component/emotion'], function (emotion) {
                emotion(options);
            })
        },
        //字体选择
        font: function (callback) {
            require(['component/font'], function (font) {
                font(callback);
            })
        },
        //css加载动画
        spinners: function (callback) {
            require(['css!less/spinners.css'])
        },
        //字体选择
        swiper: function (el, options) {
            require(['component/swiper'], function (swiper) {
                swiper(el, options);
            })
        },
        //字体选择
        map: function (val, callback) {
            require(['component/map'], function (map) {
                map(val, callback);
            })
        },
        //表单提交
        submit: function (options) {
            require(['component/submit'], function (submit) {
                submit(options);
            })
        },
        //发送验证码
        validCode: function (options) {
            require(['component/validCode'], function (validCode) {
                validCode(options);
            })
        },
        //dplayer播放器
        DPlayer: function (options) {
            require(['DPlayer'], function (DPlayer) {
                let dp = new DPlayer(options);
            })
        },
        //视频播放器
        video: function (TagName, callback) {
            require(['component/video'], function (video) {
                video(TagName, callback);
            })
        },
        //表单验证
        validate: function () {
            require(['package/jquery.form-validator.min'], function () {
                $.validate();
            })
        },
        //MD5加密
        md5: function (content, callback) {
            require(['package/spark-md5.min'], function (md5) {
                callback(md5.hash(content));
            })
        },
        //设备检测
        isMobile: function () {
            let userAgentInfo = navigator.userAgent;
            let Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            let flag = false;
            for (let v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) {
                    flag = true;
                    break;
                }
            }
            return flag;
        },
        //加载动画
        loading: function (callback) {
            require(['css!less/spinners.css'], function () {
                let html = '<div id="loading-css-hdjs" ' +
                    'style="width: 100%;top:0;right:0;bottom:0;left:0;text-align: center;' +
                    'position: absolute;padding-top:20%;background: rgba(255,255,255,0.6);z-index: 9999;">\n' +
                    '    <span class="timer-loader">Loading&#8230;</span>\n' +
                    '</div>';
                $('body').append(html);
                if ($.isFunction(callback)) {
                    callback($("#loading-css-hdjs"));
                }
            })
        },
        //URL中GET参数管理
        get: {
            get: function (par, url) {
                //获取当前URL
                var local_url = url ? url : document.location.href;
                //获取要取得的get参数位置
                var get = local_url.indexOf(par + "=");
                if (get == -1) {
                    return false;
                }
                //截取字符串
                var get_par = local_url.slice(par.length + get + 1);
                //判断截取后的字符串是否还有其他get参数
                var nextPar = get_par.indexOf("&");
                if (nextPar != -1) {
                    get_par = get_par.slice(0, nextPar);
                }
                return get_par;
            },
            //替换get参数
            set: function (paramName, replaceWith, url) {
                var url = url ? url : document.location.href;
                var oUrl = url.toString();
                if (oUrl.indexOf(paramName) >= 0) {
                    var re = eval('/(' + paramName + '=)([^&]*)/gi');
                    return oUrl.replace(re, paramName + '=' + replaceWith);
                } else {
                    return oUrl + '&' + paramName + '=' + replaceWith;
                }
            },
            regexp: {
                //手机
                mobile: function (val) {
                    return /^\d{11}$/.test(val);
                },
                //邮箱
                email: function (val) {
                    return !/^.+@.+$/.test(val);
                }
            }
        }
    }
});
