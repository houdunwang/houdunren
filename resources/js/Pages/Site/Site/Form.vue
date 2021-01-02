<template>
    <hd-layout :tabs="tabs">
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>站点资料</span>
                </div>
                <el-form-item label="站点名称">
                    <el-input v-model="form.title" />
                    <hd-error :message="form.error('title')" />
                </el-form-item>
                <el-form-item label="访问域名">
                    <el-input v-model="form.domain" />
                    <hd-error :message="form.error('domain')" />
                </el-form-item>
            </el-card>
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">默认模块</div>
                <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                    <div slot="header">
                        <span>模块选择</span>
                    </div>
                    <el-table :data="moduleData" style="width: 100%" border ref="moduleTable">
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
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </div>
        </el-form>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { title: '', domain: '', module_id: null }

export default {
    props: ['site', 'modules'],
    data() {
        return {
            tabs,
            moduleData: Object.values(this.modules),
            form: this.$inertia.form(this.site || form)
        }
    },
    methods: {
        onSubmit() {
            const url = this.form.id ? route('site.site.update', this.site) : route('site.site.store')
            this.form[this.form.id ? 'put' : 'post'](url)
        }
    }
}
</script>

<style></style>
