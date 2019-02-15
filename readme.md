# HDCMS 5.0

基于Laravel 框架重构的PC、WAP、微信公众号、微信小程序多应用平台。

> 5.0.1 beta 测试版开发阶段

## 产品特点

- 全新的产品设计、快速的产品创新、超出用户期待的产品价值，基于微信/桌面/移动三网通设计模式为企业提供开发、运营、培训、推广一体化解决方案，帮助企业实现线上线下互通（O2O），社会化客户关系管理（SCRM），移动电商，轻应用（lightapp）WMAPP等多个层面的业务开发。
- 系统提供方便的二次开发机制，可根据自身业务需要快捷开发功能模块，并可将功能模块发布到应用商店进行二次获利。
- 完全免费使用的同时HDCMS不定期发布版本更新，不断推出让使用者惊喜的新功能，新模块。企业或个人也可以使用HDCMS做成云服务，让其他用户入住云应用，进行网站搭建与模块使用，企业只需要配置好相应套餐即可轻松营利。

## 软件截图

[![image-20180912025329788](https://github.com/houdunwang/hdcms/raw/30f2fb07ef0e95f6cb3a92522b1dcc30a5cc5561/assets/image-20180912025329788.png)](https://github.com/houdunwang/hdcms/blob/30f2fb07ef0e95f6cb3a92522b1dcc30a5cc5561/assets/image-20180912025329788.png)

## 在线手册

官方提供了完善的帮助手册，便于开发者进行二次开发 [查看手册](http://doc.hdcms.com/)

## 官方网站

[http://www.hdcms.com](http://www.hdcms.com/)

## 感谢

下面是依赖的第三方库，鸣谢不分先后顺序。

- <https://haubek.github.io/chosen/>
- <https://github.com/zenorocha/clipboard.js.git>
- <https://martinemmert.github.io/clockpicker-umd/>
- <https://fontawesome.com/icons>
- <https://github.com/xdan/datetimepicker>
- <http://momentjs.com/>
- <https://github.com/soldair/node-qrcode>
- <https://select2.org/getting-started/basic-usage>
- <https://farbelous.io/bootstrap-colorpicker/tutorial-Basics.html>
- <https://github.com/chriso/validator.js>
- <https://github.com/zeroclipboard/zeroclipboard>
- <http://fex.baidu.com/webuploader/>

> 100% 免费使用于任何项目



# 使用手册

## 前端组件

### tabs

**使用效果**

![image-20181226204749663](assets/image-20181226204749663-5828469.png)

**示例代码**

```
@component('components.nav',['navs'=>[
	['title'=>'文章列表','url'=>route('content.article.index'),'active'=>true],
	['title'=>'发表文章','url'=>route('content.select_category')]
]])
@endcomponent
```

**属性说明**

| 属性   | 说明         |
| ------ | ------------ |
| title  | 菜单名称     |
| url    | 菜单链接     |
| active | 当前高亮菜单 |

## 内容评论

系统内置了评论功能，可方便集成到各个模块中使用。

模型需要引入 CommonRelation 这个 trait

```
class EduTopic extends Model
{
    use CommonRelation;
    ...
}
```

后台控制器

```
public function show(EduVideo $video,CommentRepository $commentRepository)
{
   	...
   	# 获取评论列表，每页显示10条
	$comments = $commentRepository->lists($video,10);
	return view('edu.video.show', compact('video','comments'));
}
```

前台视图调用

```
@include('common.comment',['comments'=>$comments,'model'=>$topic])
```

