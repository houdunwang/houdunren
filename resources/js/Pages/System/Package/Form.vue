<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <hd-layout :tabs="tabs" home="system.home">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <template v-slot:header>套餐资料</template>

                <el-form-item label="套餐名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.error('title')" />
                </el-form-item>
                <el-form-item label="可用天数">
                    <el-input type="number" v-model="form.days"></el-input>
                    <hd-error :message="form.error('days')" />
                </el-form-item>
            </el-card>

            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>模块选择</span>
                </div>
                <el-table :data="moduleData" style="width: 100%" border ref="moduleTable" @selection-change="handleSelectionModuleChange">
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
        </hd-layout>
    </el-form>
</template>

<script>
import tabs from './tabs'

const form = { title: '', days: 7, modules: [] }
export default {
    props: ['modules'],
    data() {
        return {
            tabs,
            moduleData: Object.values(this.modules),
            form: this.$inertia.form(this.$page.package || form)
        }
    },
    mounted() {
        this.form.modules = this.form.modules.map(module => {
            const selectModule = this.moduleData.find(m => m.id == module.id)
            if (selectModule) this.$refs.moduleTable.toggleRowSelection(selectModule)

            return module.id
        })
    },
    methods: {
        onSubmit() {
            if (this.form.id) {
                //更新
                let url = route('system.package.update', this.form.id)
                this.$inertia.put(url, this.form)
            } else {
                //添加
                let url = route('system.package.store')
                this.$inertia.post(url, this.form)
            }
        },
        //模块选择
        handleSelectionModuleChange(modules) {
            this.form.modules = modules.map(m => m.id)
        }
    }
}
</script>

<style></style>
