<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <el-card shadow="nerver" :body-style="{ padding: '20px' }">
            <div slot="header">
                回复规则
            </div>
            <el-form-item label="规则名称">
                <el-input v-model="form.rule.title"></el-input>
                <error name="title" />
            </el-form-item>
            <el-form-item label="规则类型">
                <el-radio v-model="form.rule.type" label="base">普通文本</el-radio>
                <el-radio v-model="form.rule.type" label="regexp">图文消息</el-radio>
                <el-radio v-model="form.rule.type" label="regexp">图片消息</el-radio>
            </el-form-item>
            <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    关键词设置
                </div>
                <el-form-item label="匹配方式">
                    <el-radio v-model="form.rule.type" label="base">普通文本</el-radio>
                    <el-radio v-model="form.rule.type" label="regexp">正则表达式</el-radio>
                </el-form-item>
                <el-form-item label="关键词">
                    <el-input v-model="form.rule.title"></el-input>
                    <error name="title" />
                </el-form-item>
            </el-card>
        </el-card>
        <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                消息内容
            </div>
            <el-form-item label="标题">
                <el-input v-model="form.title"></el-input>
                <error name="title" />
            </el-form-item>
            <el-form-item label="简介">
                <el-input type="textarea" :rows="3" v-model="form.description"></el-input>
                <error name="title" />
            </el-form-item>
            <el-form-item label="图片">
                <hd-upload-image v-model="form.preview" />
                <error name="title" />
            </el-form-item>
            <el-form-item label="内容">
                <wang-editor v-model="form.content" />
                <error name="title" />
            </el-form-item>
        </el-card>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </div>
    </el-form>
</template>

<script>
const form = { title: '', description: '', preview: '', content: '', rule: { title: '', type: 'base', keyword: '' } }
export default {
    props: ['id'],
    data() {
        return { form: Object.assign({}, form) }
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
