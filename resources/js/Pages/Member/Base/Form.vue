<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="never" :body-style="{ padding: '20px' }">
            <div slot="header">
                基本资料
            </div>
            <el-form-item :label="field.label" v-for="(field, index) in fields" :key="index">
                <el-input v-model="form[field.id]"></el-input>
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
    { label: 'GIBHUB', id: 'github' },
    { label: 'QQ', id: 'qq' },
    { label: '微博', id: 'weibo' }
]
export default {
    props: ['user'],
    data() {
        return {
            form: this.$inertia.form(this.user),
            fields
        }
    },
    methods: {
        onSubmit() {
            this.axios.put(`/api/user/base`, this.form.valueOf())
        }
    }
}
</script>

<style></style>
