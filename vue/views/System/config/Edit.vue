<template>
    <div>
        <hd-tab :tabs="tabs" />
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
                    <hd-image v-model="form.logo" action="system/upload" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
import tabs from './tabs'
const form = { title: '', copyright: '', logo: '' }
export default {
    data() {
        return { form, loading: true, tabs }
    },
    async created() {
        const config = await this.axios.get(`system/config`)
        this.form = Object.assign(form, config || {})
        this.loading = false
    },
    methods: {
        async onSubmit() {
            await this.axios.put('system/config', this.form)
            this.$store.dispatch('getSystemConfig', `system/config`)
        }
    }
}
</script>

<style></style>
