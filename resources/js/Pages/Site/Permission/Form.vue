<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-alert type="info" class="mb-3"> 你正在设置「{{ site.title }}」站点的「{{ role.title }}」角色的权限 </el-alert>

        <el-card shadow="nerver" class="mb-5 shadow-sm" :body-style="{ padding: '20px' }" v-for="module in modules" :key="module.id">
            <div slot="header">{{ module.title }}</div>
            <div v-for="(permission, index) in module.permissions" :key="index">
                <div class="border-b border-gray-100 mb-3 text-gray-600 text-sm py-3">
                    {{ permission.title }}
                </div>
                <div class="grid grid-cols-4 text-sm">
                    <div v-for="(rule, i) in permission.rules" :key="i" class="py-2">
                        <el-checkbox v-model="form.permissions" :value="rule.name">{{ rule.title }}</el-checkbox>
                    </div>
                </div>
            </div>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { permissions: [] }
export default {
    props: ['site', 'role', 'modules'],
    data() {
        return {
            tabs: tabs(this.site),
            form: this.$inertia.form(form)
        }
    }
}
</script>

<style></style>
