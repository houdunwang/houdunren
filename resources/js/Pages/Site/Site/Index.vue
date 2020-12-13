<template>
  <div>
    <hd-card class="bg-gray-100 shadow-md">
      <template v-slot:header class="">
        <inertia-link
          :href="route('site.site.create')"
          class="px-3 py-2 text-sm text-gray-100 bg-blue-500 rounded-sm shadow-sm hover:bg-blue-700 duration-300"
        >
          <i class="fa fa-plus" aria-hidden="true"></i> 添加网站
        </inertia-link>
      </template>

      <template v-slot>
        <hd-card>
          <template v-slot:header class="">
            <div class="flex items-center justify-between">
              <div class="text-sm text-gray-900">套餐: 至尊套餐</div>
              <a
                href="route('site.module.index',$site) "
                class="text-sm text-gray-900"
              >
                <i class="fa fa-cog" aria-hidden="true"></i> 应用扩展
              </a>
            </div>
          </template>

          <template v-slot:default class="">
            <div class="flex items-baseline">
              <i
                class="mr-3 text-gray-900 fa fa-rss fa-3x"
                aria-hidden="true"
              ></i>
              <a href="#" class="text-3xl text-gray-900">新浪网</a>
            </div>
          </template>

          <template v-slot:footer class="">
            <div class="flex justify-between text-sm text-gray-600">
              <div class="mb-2 small">
                # 1 创建时间: 2020-02-03 站长: 李四 所属组: vip 默认模块:
                在线教育
              </div>
              <div class="small">
                <a href="" target="_blank" class="mr-2 text-muted">
                  <i aria-hidden="true" class="fa fa-home"></i>
                  访问首页
                </a>
                <a href="" class="mr-2 text-muted">
                  <i aria-hidden="true" class="fa fa-check-circle-o"></i>
                  网站配置
                </a>
                <a
                  href="sdsdlksdklsdklsdklsdklsdlksdklsdklsdlklk"
                  class="mr-2 text-muted"
                >
                  <i class="fa fa-comment-o"></i>
                  微信公众号
                </a>
                <a
                  href=" route('site.admin.index',$site) "
                  class="mr-2 text-muted"
                >
                  <i class="fa fa-user-circle-o"></i>
                  管理员设置
                </a>
                <a
                  href=" route('site.role.index',$site) "
                  class="mr-2 text-muted"
                >
                  <i class="fa fa-user-secret" aria-hidden="true"></i>
                  角色管理
                </a>
                <a
                  href=" route('site.site.menu.index',$site) "
                  class="mr-2 text-muted"
                >
                  <i class="fa fa-archive" aria-hidden="true"></i>
                  菜单设置
                </a>
                <a
                  href=" route('site.site.edit',$site) "
                  class="mr-2 text-muted"
                >
                  <i class="fa fa-pencil-square-o"></i>
                  编辑
                </a>

                <btn-del
                  action=" route('site.site.destroy',$site) "
                  class-name="text-muted"
                >
                  <i class="fa fa-trash"></i>
                  删除
                </btn-del>
              </div>
            </div>
          </template>
        </hd-card>
      </template>
    </hd-card>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
