<template>
    <el-card shadow="always" :body-style="{ padding: '20px' }" v-loading="loading">
        <div slot="header">
            <span>系统配置</span>
        </div>
        <el-form :model="form" label-width="80px" :inline="false" size="normal">
            <el-form-item label="系统名称">
                <el-input v-model="form.title"></el-input>
            </el-form-item>
            <el-form-item label="版权信息">
                <el-input v-model="form.copyright"></el-input>
            </el-form-item>
            <el-form-item label="后台标志">
                <hd-image v-model="form.logo" />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
            </el-form-item>
        </el-form>
    </el-card>
</template>

<script>
export default {
    data() {
        return { form: { title: '', copyright: '', logo: '' }, loading: true }
    },
    async created() {
        this.form = await this.axios.get(`system/config/1`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            await this.axios.put('system/config/1', this.form)
            this.$store.dispatch('getSystemConfig')
        }
    }
}
</script>

<style></style>
