## 项目介绍 

houdunren-vue 帮助大家加快前端项目的开发，本项目提供了前端开发的很多基础功能。使用 vite、typescript、vue3、element-plus、pinia、vue-router、axios、tailwindcss 等技术开发。

**项目特点**

- 组件自动加载
- 提供组件扩展能力
- 支持 typescript
- 使用 vue3+pinia 等新技术
- 项目结构清晰，方便快速开发
- 全局表单验证
- tailwindcss 与 element-plus 样式控制
- 后台菜单自定义控制
- 路由权限、图标等自定义控制
- 移动端自适应用


**在线文档**

请查看[在线手册](https://doc.houdunren.com)学习使用，同时 [后盾人](https://www.houdunren.com/) 也提供了丰富的视频教程。



### 作者

开发者 [向军大叔](https://www.houdunren.com) 从事编程多年的老程序员，晚 8 点在抖音与 B 站直播，欢迎光临。



### 版本库

我会将项目提交到 [github](https://github.com/houdunwang/vue) 与 [gitee](https://gitee.com/houdunren/vue) 两个版本库。



## 安装项目

现在我们来安装前端脚手架项目，我介绍三种安装方式

安装后修改.env 文件内容: **VITE_MOCK_ENABLE=true**，这样可以使用 mock 数据查看效果，如果你有后台数据记得设置为**false**。



### CLI

首先全局安装 `houdunren-vue` 命令

```
npm install -g houdunren-vue
#或
pnpm add -g houdunren-vue
```

然后执行 `houdunren-vue` 命令，按提示进行操作

```
➜  code houdunren-vue
  _                     _
 | |__   ___  _   _  __| |_   _ _ __  _ __ ___ _ __    ___ ___  _ __ ___
 | '_ \ / _ \| | | |/ _` | | | | '_ \| '__/ _ \ '_ \  / __/ _ \| '_ ` _ \
 | | | | (_) | |_| | (_| | |_| | | | | | |  __/ | | || (_| (_) | | | | | |
 |_| |_|\___/ \__,_|\__,_|\__,_|_| |_|_|  \___|_| |_(_)___\___/|_| |_| |_|

欢迎使用后盾人前端脚手架，向军大叔每晚8点在抖音与bilibli直播
? 请输入目录名 hd
✔ 项目创建成功，请依次执行以下命令
cd hd
pnpm install
pnpm run dev
修改.env文件: VITE_MOCK_ENABLE=true
```

**更新命令**

你可以执行以下命令获取 `houdunren-vue` 获取更新

```
pnpm update -g
```



### npx

如果只想在项目中使用 houdunren-vue，使用 npx 是简单的

首先在项目中安装 houdunren-vue

```
pnpm add houdunren-vue
```

然后执行命令安装项目

```
npx houdunren-vue
```



### GIT

你也通过 [github](https://github.com/houdunwang/vue) 或 [gitee](https://gitee.com/houdunren/vue) 下载源码进行安装。
```
$ git clone https://gitee.com/houdunren/vue houdunren-vue
$ cd houdunren-vue
$ npm install
$ npm run dev
```



## 项目预览

![image-20220424180043074](https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/image-202204241800430745.jpg)

![image-20220424193919149](https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/image-20220706223604418.jpg)

![image-20220706223650063](https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/image-20220706223650063.jpg)



## 每晚直播

向军大叔会在每晚八点进行直播，与大家交流技术与生活。

<img src="https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/xj.jpg" alt="image-20210216220804022" style="zoom:50%;" />

请扫描下方二维码进入直播间，我们一起交流成长。

| 抖音 | Bilibili |
| --- | --- |
| ![image-20210216220804022](https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/douyin.jpg) | ![image-20210216220804022](https://git-readme-image.oss-cn-hangzhou.aliyuncs.com/houdunren-vue-cli/bilibli.jpg) |
