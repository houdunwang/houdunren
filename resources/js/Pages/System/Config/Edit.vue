<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
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
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
const menus = [{ name: 'edit', title: '系统配置', link: route('system.config.edit') }]

export default {
    data() {
        return { menus, form: this.$page.system.config }
    },
    methods: {
        onSubmit() {
            this.$inertia.put(route('system.config.update'), this.form)
        }
    }
}
</script>

<style></style>
