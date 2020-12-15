<template>
  <div>
    <inertia-link
      :href="route('site.site.create')"
      class="inline-block mb-3 px-3 py-1 text-sm font-bold text-gray-100 bg-blue-600 rounded-sm shadow-md hover:bg-blue-600 duration-300"
    >
      <i class="fa fa-plus" aria-hidden="true"></i> 添加网站
    </inertia-link>
    <template>
      <card
        class="mb-3 shadow-sm hover:shadow-lg"
        v-for="site in sites"
        :key="site.id"
      >
        <template v-slot:header>
          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">套餐: 至尊套餐</div>
            <a href="" class="text-sm text-gray-900">
              <i class="fa fa-cog" aria-hidden="true"></i> 应用扩展
            </a>
          </div>
        </template>

        <template v-slot:default class="">
          <div class="flex items-baseline">
            <i
              class="mr-3 text-gray-700 fa fa-rss fa-3x"
              aria-hidden="true"
            ></i>
            <a href="#" class="text-3xl text-gray-600 font-bold">
              {{ site.title }}
            </a>
          </div>
        </template>

        <template v-slot:footer class="">
          <div class="flex items-center justify-between text-sm text-gray-600">
            <div class="mb-2">
              # 1 创建时间: 2020-02-03 站长: 李四 所属组: vip 默认模块:
              {{ site.title }}
            </div>
            <div class="text-sm text-gray-500">
              <a href="" target="_blank" class="mr-2">
                <i aria-hidden="true" class="fa fa-home"></i>
                访问首页
              </a>
              <a href="" class="mr-2">
                <i aria-hidden="true" class="fa fa-check-circle-o"></i>
                网站配置
              </a>
              <a href="" class="mr-2">
                <i class="fa fa-comment-o"></i>
                微信公众号
              </a>
              <a href="" class="mr-2">
                <i class="fa fa-user-circle-o"></i>
                管理员设置
              </a>
              <a href="" class="mr-2">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                角色管理
              </a>
              <a href="" class="mr-2">
                <i class="fa fa-archive" aria-hidden="true"></i>
                菜单设置
              </a>
              <a href="" class="mr-2">
                <i class="fa fa-pencil-square-o"></i>
              </a>
              <a href="" class="mr-2"> 编辑 </a>
              <inertia-link href="">
                <i class="fa fa-trash"></i>
                删除
              </inertia-link>
            </div>
          </div>
        </template>
      </card>
    </template>
  </div>
</template>

<script>
export default {
  props: ["sites"],
};
</script>

<style></style>
