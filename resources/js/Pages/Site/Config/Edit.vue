<template>
    <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal" label-position="left">
        <el-tabs v-model="activeName" type="card">
            <el-tab-pane>
                <template v-slot:label>
                    <inertia-link :href="route('site.site.index')">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </inertia-link>
                </template>
            </el-tab-pane>

            <el-tab-pane label="基本信息" name="base"> <base-config /> </el-tab-pane>
            <el-tab-pane label="用户相关" name="user"> <user /> </el-tab-pane>
            <el-tab-pane label="阿里云" name="aliyun"> <aliyun /> </el-tab-pane>
            <el-tab-pane label="支付宝" name="alipay"> <alipay /> </el-tab-pane>
            <el-tab-pane label="微信支付" name="wepay"> <wepay /> </el-tab-pane>
            <el-tab-pane label="上传配置" name="upload"> <upload /> </el-tab-pane>
            <el-tab-pane label="邮箱配置" name="email"> <email /> </el-tab-pane>
            <el-tab-pane label="短信验证码" name="sms"> <sms /> </el-tab-pane>
        </el-tabs>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">立即创建</el-button>
        </div>
    </el-form>
</template>

<script>
import config from './config'
import BaseConfig from './Components/Base'
import User from './Components/User'
import Aliyun from './Components/Aliyun'
import Alipay from './Components/Alipay'
import Wepay from './Components/Wepay'
import Upload from './Components/Upload'
import Email from './Components/Email'
import Sms from './Components/Sms'

export default {
    components: { BaseConfig, User, Aliyun, Alipay, Wepay, Upload, Email, Sms },
    provide() {
        return { form: this.form }
    },
    props: ['site', 'wechats'],
    data() {
        return { activeName: 'base', form: Object.assign(config, this.site.config) }
    },
    methods: {
        onSubmit() {
            this.$inertia.put(route('site.config.update', this.site.id), this.form)
        }
    }
}
</script>

<style>
</style>
