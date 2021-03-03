<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-tabs value="first" type="card">
                <el-tab-pane label="基本信息" name="first">
                    <el-card shadow="nerver" :body-style="{ padding: '20px' }" v-loading="loading">
                        <el-form-item label="模型选择">
                            <el-select v-model="form.model_id" placeholder="请选择">
                                <el-option v-for="model in models" :key="model.id" :label="model.title" :value="model.id"> </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="栏目名称">
                            <el-input v-model="form.title" placeholder="" size="normal" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="栏目类型">
                            <el-radio-group v-model="form.type" size="mini">
                                <el-radio-button label="1">普通栏目</el-radio-button>
                                <el-radio-button label="2">封面栏目</el-radio-button>
                                <el-radio-button label="3">单文章</el-radio-button>
                                <el-radio-button label="4">外部链接</el-radio-button>
                            </el-radio-group>
                        </el-form-item>
                        <el-form-item label="预览图">
                            <hd-image v-model="form.preview" :action="`/api/upload/site/${site.id}`" />
                        </el-form-item>
                        <el-form-item label="关键词" v-if="form.type <= 2">
                            <el-input v-model="form.keywords" placeholder="" size="normal" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="栏目描述" v-if="form.type <= 2">
                            <el-input type="textarea" v-model="form.description" placeholder="" size="normal" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="文章内容" v-if="form.type == 3">
                            <wang-editor v-model="form.content" />
                        </el-form-item>
                        <el-form-item label="跳转链接" v-if="form.type == 4">
                            <el-input v-model="form.url" placeholder="" size="normal" clearable></el-input>
                        </el-form-item>
                    </el-card>
                </el-tab-pane>
                <el-tab-pane label="模板设置" name="second">
                    <el-card shadow="nerver" :body-style="{ padding: '20px' }" v-loading="loading">
                        <el-form-item label="模型选择">
                            <el-select v-model="form.model" placeholder="请选择">
                                <el-option v-for="model in models" :key="model.id" :label="model.title" :value="model"> </el-option>
                            </el-select>
                        </el-form-item>
                    </el-card>
                </el-tab-pane>
            </el-tabs>
            <el-button type="primary" @click="onSubmit" class="mt-3 d-block">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
const form = { title: '', model_id: null, type: 1, content: '' }
import tabs from './tabs'
export default {
    props: ['id'],
    data() {
        return { form, tabs, loading: true, models: [] }
    },
    async created() {
        this.models = await axios.get(`model`)
        if (this.id) {
            this.form = await axios.get(`content/${this.id}`)
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
