//剪贴板
define(['package/clipboard.min'], function (ClipboardJS) {
    return function (elem, options, callback) {
        console.log(elem)
        console.log(options)
        let clipboard = new ClipboardJS(elem,options);
        clipboard.on('success', callback);
    }
});