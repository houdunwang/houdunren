/**
 * 前端模块配置
 * @author 向军 <2300071698@qq.com>
 */
config = {
    urlArgs: 'version=4.0.19',
    baseUrl: window.hdjs.base,
    paths: {
        hdjs: 'hdjs',
        css: 'css.min',
        domReady: 'domReady',
        vue: 'package/vue.min',
        scrollTo: 'package/jquery.scrollTo.min',
        semantic: 'https://cdn.bootcss.com/semantic-ui/2.4.1/semantic.min',
        Aliplayer: 'package/aliplayer-min',
        //微信JSSDK
        jweixin: 'http://res.wx.qq.com/open/js/jweixin-1.2.0',
        //百度编辑器
        ueditor: 'package/ueditor/ueditor.all',
        //代码高亮
        prism: 'package/prism/prism',
        //剪贴版
        ZeroClipboard: 'package/ZeroClipboard.min',
        //JS验证
        validator: 'package/validator.min',
        //上传组件
        webuploader: 'package/webuploader/dist/webuploader',
        bootstrap: 'https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min',
        lodash: 'package/lodash.min',
        moment: 'package/moment.min',
        oss: 'component/oss',
        'jquery-mousewheel': 'package/jquery.mousewheel.min',
        jquery: 'https://cdn.bootcss.com/jquery/3.3.1/jquery.min',
        axios: 'package/axios.min',
        codemirror: 'package/codemirror.min',
        plupload: 'package/plupload/plupload.full.min',
        simditor: 'package/simditor/scripts/simditor',
        'simditor-fullscreen': 'package/simditor/simditor-fullscreen-master/lib/simditor-fullscreen',
        marked: 'package/marked.min',
        'to-markdown': 'package/to-markdown.min',
        'simditor-markdown': 'package/simditor/simditor-markdown/lib/simditor-markdown',
        'simditor-dropzone': 'package/simditor/simditor-dropzone/lib/simditor-dropzone',
        'simple-module': 'package/simditor/scripts/module',
        DPlayer: 'package/dplayer/DPlayer.min',
        highlight: 'https://cdn.bootcss.com/highlight.js/9.15.6/highlight.min',
        MarkdownIt: 'package/markdown-it.min',
        //editor.md
        prettify: 'package/prettify.min',
        raphael: 'package/editor.md/lib/raphael.min',
        underscore: 'package/underscore-min',
        flowchart: 'package/editor.md/lib/flowchart.min',
        jqueryflowchart: 'package/editor.md/lib/jquery.flowchart.min',
        sequenceDiagram: 'package/editor.md/lib/sequence-diagram.min',
        katex: 'package/katex.min',
        editormd: 'package/editor.md/editormd.amd',
        iziToast: 'package/iziToast/iziToast.min',
        tuiEditor: 'https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor',
        //
        bootstrapTable: 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.2/locale/bootstrap-table-zh-CN.min',
        sortablejs: 'https://cdn.bootcss.com/Sortable/1.8.3/Sortable.min',
        vuedraggable: 'https://cdn.bootcss.com/Vue.Draggable/15.0.0/vuedraggable.min',

        nestedSortable: 'https://cdn.bootcss.com/nestedSortable/2.0.0/jquery.mjs.nestedSortable',
        jqueryUi: 'https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min',
        jqueryUiSortable: 'https://cdn.bootcss.com/jqueryui/1.10.4/jquery.ui.sortable.min',
        jquerySortable: 'https://cdn.bootcss.com/jquery-sortable/0.9.13/jquery-sortable'
    },
    shim: {
        jquerySortable: {
            deps: ['jquery']
        },
        nestedSortable: {
            deps: [
                'jqueryUiSortable'
            ]
        },
        jqueryUiSortable: {
            deps: [
                'jqueryUi'
            ]
        },
        jqueryUi: {
            deps: [
                'jquery'
            ]
        },
        vuedraggable: {
            deps: [
                'sortablejs'
            ]
        },
        semantic: {
            deps: [
                'jquery'
            ]
        },
        bootstrapTable: {
            deps: [
                'jquery',
                'bootstrap',
                'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.2/bootstrap-table.min.js',
                // 'css!http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.2/bootstrap-table.min.css'
                // 'css!https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.min.css'
            ]
        },
        tuiEditor: {
            deps: [
                '/bower_components/tui-code-snippet/dist/tui-code-snippet.js'
            ]
        },
        iziToast: {
            deps: ['css!package/iziToast/iziToast.min.css']
        },
        bootstrap: {
            deps: ['jquery']
        },
        hdjs: {
            deps: ['css!package/font-awesome-4.7.0/css/font-awesome.min.css']
        },
        DPlayer: {
            deps: ['css!package/dplayer/DPlayer.min.css']
        },
        simditor: {
            deps: [
                'jquery',
                'package/simditor/scripts/module',
                'package/simditor/scripts/hotkeys',
                'package/simditor/scripts/uploader',
                'css!package/simditor/simditor-fullscreen-master/styles/simditor-fullscreen.css',
                'css!package/simditor/styles/simditor.css',
                'css!package/simditor/styles/hdjs.css',
                'css!package/simditor/simditor-markdown/styles/simditor-markdown.css'
            ]
        },
        plupload: {
            exports: 'plupload'
        },
        highlight: {
            deps: ['css!https://cdn.bootcss.com/highlight.js/9.15.6/styles/androidstudio.min.css']
        },
        editormd: {
            deps: [
                'underscore',
                'flowchart',
                'sequenceDiagram',
                'css!package/editor.md/css/editormd.css',
                'css!package/editor.md/lib/codemirror/codemirror.min.css'
            ]
        },
        sequenceDiagram: {
            deps: [
                'raphael'
            ]
        },
        jqueryflowchart: {
            deps: ['flowchart', 'raphael']
        },
        webuploader: {
            deps: ['css!package/webuploader/css/webuploader.css']
        },
        prism: {
            deps: [
                'css!https://cdn.bootcss.com/prism/9000.0.1/themes/prism-dark.min.css'
            ]
        },
        ueditor: {
            deps: ['ZeroClipboard', 'package/ueditor/ueditor.config']
        }
    },
    waitSeconds: 30
};
if (hdjs.requireJs) {
    config.paths = Object.assign(config.paths, hdjs.requireJs.paths);
    config.shim = Object.assign(config.shim, hdjs.requireJs.shim);
}
// console.log(config);
require.config(config);
require([
    'jquery',
    'axios'
], function ($, axios) {
    window.$ = window.jQuery = $
    //全局错误定义
    $.ajaxSetup({
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            require(['hdjs'], function (hdjs) {
                if (XMLHttpRequest.responseJSON) {
                    if (XMLHttpRequest.responseJSON.message) {
                        hdjs.message(XMLHttpRequest.responseJSON.message);
                    } else {
                        hdjs.message(JSON.stringify(XMLHttpRequest.responseJSON));
                    }
                } else {
                    hdjs.message('网站忙碌，请稍候连接');
                }
            })

        }
    });
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        //为异步请求设置CSRF令牌
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token.content
            }
        });
    }
});
