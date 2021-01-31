<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>套餐资料</template>
            <el-form-item label="套餐名称">
                <el-input v-model="form.title"></el-input>
                <hd-error name="title" />
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>模块选择</span>
            </div>
            <el-table :data="modules" style="width: 100%" border ref="moduleTable" @selection-change="handleSelectionModuleChange">
                <el-table-column type="selection" width="55"> </el-table-column>
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
        <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
    </el-form>
</template>

<script>
import tabs from './tabs'
const form = { title: '', modules: [] }

export default {
    props: ['id'],
    data() {
        return {
            tabs,
            modules: [],
            form: Object.assign({}, form)
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`package/${this.id}`)
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `package/${this.id}` : `package`
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'system.package.index' })
        },
        //模块选择
        handleSelectionModuleChange(modules) {
            this.form.modules = modules.map(m => m.id)
        }
    }
}
</script>

<style></style>
