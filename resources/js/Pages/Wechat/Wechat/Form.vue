<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>公众号资料</span>
            </div>
            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
                <el-form-item label="公众号名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.errors.title" />
                </el-form-item>
                <el-form-item label="TOKEN">
                    <el-input v-model="form.token"></el-input>
                    <hd-error :message="form.errors.token" />
                </el-form-item>
                <el-form-item label="公众号介绍">
                    <el-input type="textarea" v-model="form.introduce"></el-input>
                    <hd-error :message="form.errors.introduce" />
                </el-form-item>
                <el-form-item label="微信号">
                    <el-input v-model="form.name"></el-input>
                    <hd-error :message="form.errors.name" />
                </el-form-item>
                <el-form-item label="二维码">
                    <hd-image v-model="form.qr" />
                    <hd-error :message="form.errors.qr" />
                </el-form-item>
                <el-form-item label="公众号类型">
                    <el-radio-group v-model="form.type">
                        <el-radio label="subscribe">订阅号</el-radio>
                        <el-radio label="service">服务号</el-radio>
                    </el-radio-group>
                    <hd-error :message="form.errors.type" />
                </el-form-item>
                <el-form-item label="原始ID">
                    <el-input v-model="form.wxid"></el-input>
                    <hd-error :message="form.errors.wxid" />
                </el-form-item>
                <el-form-item label="appid">
                    <el-input v-model="form.appid" :disabled="!!wechat"></el-input>
                    <hd-error :message="form.errors.appid" />
                </el-form-item>
                <el-form-item label="appsecret">
                    <el-input v-model="form.appsecret" :disabled="!!wechat"></el-input>
                    <hd-error :message="form.errors.appsecret" />
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
const form = { title: '' }
export default {
    props: ['site', 'wechat'],
    data() {
        return {
            tabs: tabs(this.site),
            form: this.$inertia.form(this.wechat || form)
        }
    },
    methods: {
        onSubmit() {
            const param = this.form.id
                ? { action: 'put', url: route('wechat.wechat.update', this.wechat) }
                : { action: 'post', url: route('wechat.site.wechat.store', this.site) }

            this.form[param.action](param.url, this.form)
        }
    }
}
</script>

<style></style>
