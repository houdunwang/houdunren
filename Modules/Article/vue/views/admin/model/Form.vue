<template>
    <div>
        <tab :tabs="tabs" />
        <el-card shadow="nerver" :body-style="{ padding: '20px' }">
            <div slot="header">
                模型管理
            </div>
            <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
                <el-form-item label="模型名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
const form = { title: '', fields: {} }
import tabs from './tabs'
import _ from 'lodash'
import fields from '../field/fields'

export default {
    props: ['id'],
    data() {
        return { form: Object.assign({}, form), tabs }
    },
    async created() {
        if (this.id) this.form = await axios.get(`model/${this.id}`)
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `model/${this.id}` : 'model'
            if (!this.id) {
                this.form.fields = fields
            }
            await axios[this.id ? 'put' : 'post'](url, this.form)
            this.router('admin.model.index')
        }
    }
}
</script>

<style></style>
