<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                模块配置
            </div>
            <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
                <el-form-item label="">
                    <el-input v-model="form.title"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: {
        config: {
            type: Object,
            default: () => ({
                title: ''
            })
        }
    },
    data() {
        return {
            tabs,
            form: this.$inertia.form(this.config)
        }
    },
    methods: {
        onSubmit() {}
    }
}
</script>

<style></style>
