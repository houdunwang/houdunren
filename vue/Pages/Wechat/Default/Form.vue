<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>微信默认消息</span>
            </div>
            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
                <el-form-item label="关注欢迎消息">
                    <el-input v-model="form.welcome"></el-input>
                    <hd-error :message="form.error('welcome')" />
                </el-form-item>
                <el-form-item label="默认回复消息">
                    <el-input v-model="form.default_message"></el-input>
                    <hd-error :message="form.error('default_message')" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from '../tabs'
const form = {}

export default {
    props: ['site', 'wechat'],
    data() {
        return {
            tabs: tabs(this.site, this.wechat),
            form: this.$inertia.form(this.wechat)
        }
    },
    methods: {
        onSubmit() {
            this.$inertia.put(route('wechat.default.update', this.wechat), this.form)
        }
    }
}
</script>

<style>
</style>
