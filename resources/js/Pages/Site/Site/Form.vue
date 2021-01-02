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
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </div>
        </el-form>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { title: '', domain: '' }

export default {
    props: ['site'],
    data() {
        return {
            tabs,
            form: this.$inertia.form(this.site || form)
        }
    },
    methods: {
        onSubmit() {
            const url = this.form.id ? route('site.site.update', this.site) : route('site.site.store')
            this.form[this.form.id ? 'put' : 'post'](url)
        }
    }
}
</script>

<style></style>
