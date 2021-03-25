<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '20px' }">
            <div slot="header">
                基本资料
            </div>
            <el-form-item :label="field.label" v-for="(field, index) in fields" :key="index">
                <el-input v-model="form[field.id]"></el-input>
                <hd-form-error :name="field.id" />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </el-form-item>
        </el-card>
    </el-form>
</template>

<script>
const fields = [
    { label: '昵称', id: 'name' },
    { label: '微信号', id: 'wechat' },
    { label: '微博', id: 'weibo' },
    { label: 'GIBHUB', id: 'github' },
    { label: 'QQ', id: 'qq' }
]
export default {
    route: { path: '/member', meta: { keepAlive: true } },
    inject: ['site'],
    data() {
        return {
            form: this.$store.state.user,
            fields
        }
    },
    methods: {
        async onSubmit() {
            await this.axios.put(`user/${this.user.id}`, this.form)
            this.$store.dispatch('user')
        }
    }
}
</script>

<style></style>
