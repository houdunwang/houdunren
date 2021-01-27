<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    角色资料
                </div>
                <el-form-item label="角色名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.errors.title" />
                </el-form-item>
                <el-form-item label="角色标识">
                    <el-input v-model="form.name"></el-input>
                    <hd-error :message="form.errors.name" />
                </el-form-item>
                <el-form-item class="mt-3">
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: {
        errors: Object,
        site: Object,
        role: Object
    },
    data() {
        return {
            tabs: tabs(this.site),
            form: this.$inertia.form(this.role || {})
        }
    },
    methods: {
        onSubmit() {
            const url = this.role ? 'site.role.update' : 'site.role.store'
            this.form[this.role ? 'put' : 'post'](route(url, [this.site, this.role]))
        }
    }
}
</script>

<style></style>
