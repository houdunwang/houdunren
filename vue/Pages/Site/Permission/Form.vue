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
                        <el-checkbox-group v-model="form.permissions">
                            <el-checkbox :label="rule.permission_name">
                                {{ rule.title }}
                                <el-tag type="info" size="mini" class="opacity-75">{{ rule.name }}</el-tag>
                            </el-checkbox>
                        </el-checkbox-group>
                    </div>
                </div>
            </div>
        </el-card>
        <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: ['site', 'role', 'modules', 'permissions'],
    data() {
        return {
            tabs: tabs(this.site),
            form: { permissions: this.permissions }
        }
    },
    methods: {
        onSubmit() {
            this.$inertia.put(route('site.permission.update', [this.site, this.role]), this.form)
        }
    }
}
</script>

<style></style>
