<template>
  <div class="container">
      <div class="mb-5 mt-3">
        <h6 class="h6-title">应用扩展</h6>
        <section class="flex">
          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa fa-cubes" aria-hidden="true"></i>
            模块扩展
          </a>
          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-life-ring fa-2x" aria-hidden="true"></i>
            模板风格
          </a>
        </section>
      </div>

      <div class="mb-5 mt-3 ">
        <h6 class="h6-title">用户管理</h6>
        <section class="flex">
          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa-briefcase" aria-hidden="true"></i>
            我的帐户
          </a>

          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa-users" aria-hidden="true"></i>
            用户组管理
          </a>

          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa-comments-o" aria-hidden="true"></i>
            服务套餐
          </a>
        </section>
      </div>

      <div class="mb-5 mt-3">
        <h6 class="h6-title">系统管理</h6>
        <section class="flex">
          <a
            href=""
            class="box-style  hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa-sitemap" aria-hidden="true"></i>
            站点列表
          </a>
          <inertia-link
            :href="route('system.config.edit')"
            class="box-style hover:shadow-md duration-300 hover:bg-gray-50"
          >
            <i class="fa fa-2x d-block fa-tachometer" aria-hidden="true"></i>
            系统配置
          </inertia-link>
        </section>
      </div>
    </div
  </div>
</template>
<script>
export default {};
</script>
<style>
.container .h6-title {
  @apply border-l-8 pl-3 mb-4 border-gray-700 font-bold text-gray-700;
}
.container > div:nth-child(n + 2) .h6-title {
  @apply mt-10;
}
.box-style {
  @apply border flex justify-center items-center rounded bg-white shadow-sm mr-3 flex-col text-base w-36 h-24 text-gray-800 font-bold;
}
.box-style i {
  @apply text-3xl mb-2;
}
</style>
