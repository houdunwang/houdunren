<template>
    <hd-layout :tabs="tabs">
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>站点资料</span>
                </div>
                <el-form-item label="站点名称">
                    <el-input v-model="form.title" />
                    <hd-error :message="form.error('title')" />
                </el-form-item>
                <el-form-item label="访问域名">
                    <el-input v-model="form.domain" />
                    <hd-error :message="form.error('domain')" />
                </el-form-item>
            </el-card>
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">默认模块</div>
            </el-card>
            <div class="mt-3">
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
            </div>
        </el-form>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { title: '', domain: '' }

export default {
    data() {
        return {
            tabs,
            form: this.$inertia.form(form)
        }
    },
    methods: {
        onSubmit() {
            this.$inertia.post(route('site.site.store'), this.form)
        }
    }
}
</script>

<style></style>
