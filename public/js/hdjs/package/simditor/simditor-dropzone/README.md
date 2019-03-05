# Simditor-Dropzone

这是 [Simditor](http://simditor.tower.im) 的一个小插件，**它可以让『插入图片』的功能支持 『拖拽上传』**。

![Demo Gif](https://raw.githubusercontent.com/ichord/simditor-dropzone/master/demo.gif)

### 使用

只需要在 `simditor-all.js` 后引入这个文件即可。

```html
<script type="text/javascript" src="[simple module script path]/module.js"></script>
<script type="text/javascript" src="[simple uploader script path]/uploader.js"></script>
<script type="text/javascript" src="[script path]/simditor.js"></script>
<!- .... ->
<script type="text/javascript" src="[script path]/simditor-dropzone.js"></script>
```

然后就可以『拖拽上传插入图片了』，无需做其它配置。

### Demo

请用浏览器打开 `demo.html` 文件。但是这里拖入的图片会显示成丢失.  
如果想看更逼真的效果，请执行以下步骤:

* `bundle install`
* `bower install`
* `npm install`
* 执行 `grunt`
* 浏览器打开 http://0.0.0.0:8000/demo.html
* 拖入图片。
