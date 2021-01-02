<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-alert type="info" class="mb-3"> 你正在设置「{{ site.title }}」站点的「{{ role.title }}」角色的权限 </el-alert>

        <el-card shadow="always" :body-style="{ padding: '20px' }" v-for="">
            <div slot="header"></div>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: ['site', 'role', 'modules'],
    data() {
        return {
            tabs: tabs(this.site)
        }
    }
}
</script>

<style></style>
