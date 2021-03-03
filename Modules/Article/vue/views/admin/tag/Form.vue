<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                标签管理
            </div>
            <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
                <el-form-item label="标签名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
            <!-- card body -->
        </el-card>
    </div>
</template>

<script>
const form = { title: '' }
import tabs from './tabs'

export default {
    props: ['id'],
    data() {
        return { form, tabs }
    },
    async created() {
        if (this.id) this.form = await axios.get(`tag/${this.id}`)
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `tag/${this.id}` : 'tag'
            await axios[this.id ? 'put' : 'post'](url, this.form)
            this.router('admin.tag.index')
        }
    }
}
</script>

<style></style>
