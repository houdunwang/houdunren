<template>
    <div class="container">
        <div>
            <h6>应用扩展</h6>
            <section class="flex">
                <inertia-link href="">
                    <i class="fa fa-2x fa fa-cubes mb-2" aria-hidden="true"></i>
                    模块插件
                </inertia-link>
                <inertia-link href="">
                    <i class="fa fa-2x fa fa-futbol-o" aria-hidden="true"></i>
                    风格模板
                </inertia-link>
            </section>
        </div>

        <div>
            <h6>用户管理</h6>
            <section>
                <inertia-link :href="route('system.my.edit')">
                    <i class="fa fa-2x fa-briefcase" aria-hidden="true"></i>
                    我的帐户
                </inertia-link>
                <inertia-link :href="route('system.group.index')">
                    <i class="fa fa-2x fa-users" aria-hidden="true"></i>
                    用户组管理
                </inertia-link>
                <inertia-link :href="route('system.package.index')">
                    <i class="fa fa-2x fa-comments-o" aria-hidden="true"></i>
                    服务套餐
                </inertia-link>
            </section>
        </div>

        <div>
            <h6>系统管理</h6>
            <section>
                <inertia-link :href="route('site.site.index')">
                    <i class="fa fa-2x fa-sitemap" aria-hidden="true"></i>
                    站点列表
                </inertia-link>
                <inertia-link :href="route('system.config.edit')">
                    <i class="fa fa-2x fa-tachometer" aria-hidden="true"></i>
                    系统配置
                </inertia-link>
            </section>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style>
.container > div > h6 {
    @apply border-l-8 border-gray-600 pl-2 mb-3;
}
.container > div:nth-child(n + 2) > h6 {
    @apply mt-8;
}
.container > div > section {
    @apply flex;
}
.container > div > section > a {
    @apply flex flex-col justify-center items-center w-32 h-24 border rounded-md shadow-sm mr-3 text-gray-700 text-base;
}
</style>
