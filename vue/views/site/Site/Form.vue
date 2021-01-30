<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" v-loading="loading">
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>站点资料</span>
            </div>
            <el-form-item label="站点名称">
                <el-input v-model="form.title" />
                <hd-error name="title" />
            </el-form-item>
            <el-form-item label="访问域名">
                <el-input v-model="form.domain" />
                <hd-error name="domain" />
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">默认模块</div>
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>模块选择</span>
                </div>
                <el-table :data="modules" style="width: 100%" border ref="moduleTable" stripe>
                    <el-table-column width="55" v-slot="{ row: module }">
                        <el-checkbox v-model="form.module_id" :true-label="module.id"></el-checkbox>
                    </el-table-column>
                    <el-table-column prop="id" label="编号" width="100"> </el-table-column>
                    <el-table-column label="预览图" width="100" v-slot="{ row: module }">
                        <el-image style="width: 50px; height: 50px" :src="module.preview" fit="cover"></el-image>
                    </el-table-column>
                    <el-table-column prop="title" label="模块名称"> </el-table-column>
                    <el-table-column prop="name" label="模块标识" width="100"> </el-table-column>
                    <el-table-column prop="author" label="作者" width="100"> </el-table-column>
                    <el-table-column prop="version" label="版本号" width="100"> </el-table-column>
                </el-table>
            </el-card>
        </el-card>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">提交</el-button>
        </div>
    </el-form>
</template>

<script>
import tabs from './tabs'
const form = { title: '', domain: '', module_id: null }

export default {
    route: false,
    props: ['id'],
    data() {
        return {
            form: Object.assign({}, form),
            tabs,
            modules: [],
            loading: true
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`site/${this.id}`)
        this.loading = false
    },
    methods: {
        async onSubmit() {
            const url = this.form.id ? `site/site/${this.site.id}` : 'site'
            await this.axios[this.form.id ? 'put' : 'post'](url, this.form)
            // this.form = form
            this.$router.push('/admin')
        }
    }
}
</script>

<style></style>
