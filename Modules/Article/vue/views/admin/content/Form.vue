<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }" v-loading="loading">
            <div slot="header">
                文章管理
            </div>

            <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
                <el-form-item label="模型选择">
                    <el-select v-model="form.model" placeholder="请选择">
                        <el-option v-for="model in models" :key="model.id" :label="model.title" :value="model"> </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="标签">
                    <el-checkbox-group v-model="form.tags" size="mini" :max="3">
                        <el-checkbox-button v-for="t in tags" :label="t.id" :key="t.id">{{ t.title }}</el-checkbox-button>
                    </el-checkbox-group>
                </el-form-item>
                <div v-if="form.model">
                    <div v-for="(field, index) in form.model.fields" :key="index">
                        <el-form-item :label="field.title" v-if="field.show">
                            <component v-bind:is="`field-${field.type}`" :field="field"></component>
                            <hd-error :name="field.name" />
                        </el-form-item>
                    </div>
                </div>

                <!-- <el-form-item label="来源">
                    <el-input v-model="form.source"></el-input>
                    <hd-error name="source" />
                </el-form-item>
                <el-form-item label="预览图">
                    <hd-image v-model="form.thumb" :action="`/api/upload/site/${site.id}`" />
                    <hd-error name="thumb" />
                </el-form-item>
                <el-form-item label="简介">
                    <el-input type="textarea" v-model="form.description" row="5"></el-input>
                    <hd-error name="source" />
                </el-form-item>
                <el-form-item label="正文">
                    <hd-wang-editor v-model="form.content" />
                    <hd-error name="content" />
                </el-form-item>
                <el-form-item label="跳转地址">
                    <el-input v-model="form.url"></el-input>
                    <hd-tip>
                        跳转到的外部链接地址
                    </hd-tip>
                    <hd-error name="url" />
                </el-form-item>
                <el-form-item label="查看次数">
                    <el-input v-model="form.click"></el-input>
                    <hd-error name="click" />
                </el-form-item>
-->
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>
</template>

<script>
const form = { title: '', content: '', thumb: '', source: '', model_id: null, click: 0, tags: [] }
import tabs from './tabs'
export default {
    props: ['id'],
    data() {
        return { form, tabs, tags: [], loading: true, models: [] }
    },
    async created() {
        this.tags = await axios.get(`tag`)
        this.models = await axios.get(`model`)
        if (this.id) {
            const form = await axios.get(`content/${this.id}`)
            form.tags = form.tags.map(t => t.id)
            this.form = form
        }
        this.loading = false
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `content/${this.id}` : 'content'
            await axios[this.id ? 'put' : 'post'](url, this.form)
            this.router('admin.content.index')
        }
    }
}
</script>

<style></style>
