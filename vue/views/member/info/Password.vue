<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '20px' }">
            <div slot="header">
                基本资料
            </div>
            <el-form-item :label="field.label" v-for="(field, index) in fields" :key="index">
                <el-input v-model="form[field.id]" :placeholder="field.placeholder" required show-password></el-input>
                <hd-error :name="field.id" />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </el-form-item>
        </el-card>
    </el-form>
</template>

<script>
const fields = [
    { label: '原密码', id: 'old_password', placeholder: '请输入原密码' },
    { label: '新密码', id: 'password', placeholder: '请输入新密码' },
    { label: '确定密码', id: 'password_confirmation', placeholder: '请再次输入密码' }
]
export default {
    data() {
        return {
            form: { old_password: '', password: '', password_confirmation: '' },
            fields
        }
    },
    methods: {
        async onSubmit() {
            await this.axios.put(`user/password`, this.form)
        }
    }
}
</script>

<style></style>
