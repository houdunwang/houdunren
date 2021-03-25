<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-alert effect="light" closable>
            正在设置【{{ form.title }}】公众号的默认消息 <br />
            可以选择消息进行设置，也可以直接设置回复内容
        </el-alert>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>公众号默认消息设置</span>
            </div>
            <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
                <el-form-item label="关注欢迎消息">
                    <hd-wechat-message-preview :message="welcomeMessage" v-if="welcomeMessage" class="mb-1" />
                    <el-input v-model="form.welcome">
                        <template slot="append">
                            <span @click="showWelcomeMessageDialog = true" class="text-gray-500 cursor-pointer">选择消息</span>
                        </template>
                    </el-input>
                    <hd-wechat-message-select :wechat="form" v-if="form.id" :show.sync="showWelcomeMessageDialog" @select="selectWelcomeMessage" />
                </el-form-item>
                <el-form-item label="默认回复消息">
                    <hd-wechat-message-preview :message="defaultMessage" v-if="defaultMessage" class="mb-1" />
                    <el-input v-model="form.default_message">
                        <template slot="append">
                            <span @click="showDefaultMessageDialog = true" class="text-gray-500 cursor-pointer">选择消息</span>
                        </template>
                    </el-input>
                    <hd-wechat-message-select :wechat="form" v-if="form.id" :show.sync="showDefaultMessageDialog" @select="selectDefaultMessage" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit" :disabled="isSubmit" v-loading="isSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            isSubmit: false,
            form: {},
            welcomeMessage: null,
            showWelcomeMessageDialog: false,
            defaultMessage: null,
            showDefaultMessageDialog: false
        }
    },
    async created() {
        this.form = await this.axios.get(`site/${this.$route.query.sid}/wechat/${this.$route.query.wid}`)
        this.welcomeMessage = this.form.welcomeMessage
        this.defaultMessage = this.form.defaultMessage
    },
    methods: {
        async onSubmit() {
            await axios.put(`site/${this.form.site_id}/wechat/${this.form.id}`, this.form)
            this.$router.push({ name: 'wechat.wechat.index', query: { sid: this.form.site_id } })
        },
        //关注欢迎选择消息后
        selectWelcomeMessage(message) {
            this.form.welcome = message.keyword
            this.welcomeMessage = message
        },
        //默认消息
        selectDefaultMessage(message) {
            this.form.default_message = message.keyword
            this.defaultMessage = message
        }
    }
}
</script>

<style lang="scss"></style>
