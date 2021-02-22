<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>微信默认消息</span>
            </div>
            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal" v-loading="loading">
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
            </el-form>
        </el-card>
    </div>
</template>

<script>
import tabs from './tabs'
const form = {}

export default {
    route: { path: ':sid/default/:id' },
    data() {
        return {
            tabs: tabs({ sid: this.$route.params.sid }),
            form: Object({}, form),
            sid: this.$route.params.sid,
            id: this.$route.params.id,
            loading: true
        }
    },
    async created() {
        this.form = await axios.get(`site/${this.sid}/wechat/${this.id}`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            await this.axios.put(`site/${this.sid}/wechat/${this.id}/default/message`, this.form)
            this.$router.push({ name: 'site.wechat.index', params: { sid: this.sid } })
        }
    }
}
</script>

<style></style>
