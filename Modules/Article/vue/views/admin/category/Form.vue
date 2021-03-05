<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-tabs value="first" type="card">
                <el-tab-pane label="基本信息" name="first">
                    <el-card shadow="nerver" :body-style="{ padding: '20px' }" v-loading="loading">
                        <el-form-item label="栏目类型">
                            <el-radio-group v-model="form.type" size="mini">
                                <el-radio-button label="1">普通栏目</el-radio-button>
                                <el-radio-button label="2">封面栏目</el-radio-button>
                                <el-radio-button label="3">单文章</el-radio-button>
                                <el-radio-button label="4">外部链接</el-radio-button>
                            </el-radio-group>
                            <hd-error name="type" />
                        </el-form-item>
                        <el-form-item label="模型选择" v-if="form.type <= 2">
                            <el-select v-model="form.model_id" placeholder="请选择">
                                <el-option v-for="model in models" :key="model.id" :label="model.title" :value="model.id"> </el-option>
                            </el-select>
                            <hd-error name="model_id" />
                        </el-form-item>
                        <el-form-item label="父级栏目" v-if="form.type <= 2">
                            <el-select v-model="form.pid" placeholder="请选择">
                                <el-option label="顶级栏目" :value="0"> </el-option>
                                <el-option
                                    v-for="category in categories"
                                    :disabled="disabled(category)"
                                    :key="category.id"
                                    :label="category.title"
                                    :value="category.id"
                                >
                                    {{ '-'.repeat(category.level * 3) }}
                                    {{ category.title }}
                                </el-option>
                            </el-select>
                            <hd-error name="pid" />
                        </el-form-item>
                        <el-form-item label="栏目名称">
                            <el-input v-model="form.title" placeholder="" size="normal" clearable></el-input>
                            <hd-error name="title" />
                        </el-form-item>

                        <el-form-item label="关键词" v-if="form.type != 4">
                            <el-input v-model="form.keywords" placeholder="" size="normal" clearable></el-input>
                            <hd-error name="keywords" />
                        </el-form-item>
                        <el-form-item label="栏目简介" v-if="form.type != 4">
                            <el-input type="textarea" v-model="form.description" placeholder="" size="normal" clearable></el-input>
                            <hd-error name="description" />
                        </el-form-item>
                        <el-form-item label="跳转链接" v-if="form.type == 4">
                            <el-input v-model="form.url" placeholder="" size="normal" clearable></el-input>
                            <hd-error name="url" />
                        </el-form-item>
                        <el-form-item label="预览图">
                            <hd-image v-model="form.preview" :action="`/api/upload/site/${site.id}`" />
                            <hd-error name="preview" />
                        </el-form-item>
                        <el-form-item label="文章内容" v-if="form.type == 3">
                            <wang-editor v-model="form.content" />
                            <hd-error name="content" />
                        </el-form-item>
                    </el-card>
                </el-tab-pane>
                <el-tab-pane label="模板设置" name="second">
                    <el-form-item label="封面模板">
                        <el-input v-model="form.index_template" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="列表模板">
                        <el-input v-model="form.list_template" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="内容页">
                        <el-input v-model="form.content_template" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                </el-tab-pane>
            </el-tabs>
            <el-button type="primary" @click="onSubmit" class="mt-3 d-block">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
const form = {
    title: '',
    pid: 0,
    model_id: null,
    type: 1,
    path: '',
    content: '',
    index_template: 'index.blade.php',
    list_template: 'list.blade.php',
    content_template: 'content.blade.php'
}
import tabs from './tabs'
export default {
    props: ['id'],
    data() {
        return { form: Object.assign({}, form), tabs, loading: true, models: [], categories: [] }
    },
    async created() {
        this.models = await axios.get(`model`)
        this.categories = await axios.get(`category`)
        this.form.model_id = this.models.length && this.models[0].id
        if (this.id) {
            this.form = await axios.get(`category/${this.id}`)
        }
        this.loading = false
    },
    methods: {
        //发表
        async onSubmit() {
            const url = this.id ? `category/${this.id}` : 'category'
            await axios[this.id ? 'put' : 'post'](url, this.form)
            this.router('admin.category.index')
        },
        //栏目是否可以选择
        disabled(category) {
            return category.type >= 3 || (this.form.id && category.path.includes(this.form.path))
        }
    }
}
</script>

<style></style>
