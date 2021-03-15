<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }" v-loading="loading">
                <div slot="header">
                    <span>公众号资料</span>
                </div>
                <el-form-item label="公众号名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item label="TOKEN">
                    <el-input v-model="form.token"></el-input>
                    <hd-error name="token" />
                </el-form-item>
                <el-form-item label="公众号介绍">
                    <el-input type="textarea" v-model="form.introduce"></el-input>
                    <hd-error name="introduce" />
                </el-form-item>
                <el-form-item label="微信号">
                    <el-input v-model="form.name"></el-input>
                    <hd-error name="name" />
                </el-form-item>
                <el-form-item label="二维码">
                    <hd-image v-model="form.qr" :action="`/api/upload/site/${$route.params.sid}`" />
                    <hd-error name="qr" />
                </el-form-item>
                <el-form-item label="公众号类型">
                    <el-radio-group v-model="form.type">
                        <el-radio label="subscribe">订阅号</el-radio>
                        <el-radio label="service">服务号</el-radio>
                    </el-radio-group>
                    <hd-error name="type" />
                </el-form-item>
                <el-form-item label="原始ID">
                    <el-input v-model="form.wxid"></el-input>
                    <hd-error name="wxid" />
                </el-form-item>
                <el-form-item label="appid">
                    <el-input v-model="form.appid" :disabled="!!id"></el-input>
                    <hd-error name="appid" />
                </el-form-item>
                <el-form-item label="appsecret">
                    <el-input v-model="form.appsecret" :disabled="!!id"></el-input>
                    <hd-error name="appsecret" />
                </el-form-item>
            </el-card>
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    默认消息
                </div>
                <el-form-item label="关注欢迎消息">
                    <el-input v-model="form.welcome"></el-input>
                    <hd-error name="welcome" />
                </el-form-item>
                <el-form-item label="默认回复消息">
                    <el-input v-model="form.default_message"></el-input>
                    <hd-error name="default_message" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
const form = {}
export default {
    props: ['id'],
    data() {
        return {
            tabs: tabs({ sid: this.$route.params.sid }),
            form: Object.assign({}, form),
            site: {},
            loading: true
        }
    },
    async created() {
        this.site = await this.axios.get(`site/${this.$route.params.sid}`)
        if (this.id) this.form = await this.axios.get(`site/${this.site.id}/wechat/${this.id}`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `site/${this.site.id}/wechat/${this.id}` : `site/${this.site.id}/wechat`
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'wechat.wechat.index', params: { sid: this.site.id } })
        }
    }
}
</script>

<style></style>
