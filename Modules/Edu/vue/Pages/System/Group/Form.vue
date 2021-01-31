<template>
    <hd-layout :tabs="tabs" home="system.home">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header="">会员组资料</template>

            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
                <el-form-item label="会员组名称">
                    <el-input type="text" v-model="form.title"></el-input>
                    <hd-error :message="form.errors.title" />
                </el-form-item>
                <el-form-item label="站点数量">
                    <el-input type="text" v-model="form.site_num"></el-input>
                    <hd-error :message="form.errors.site_num" />
                </el-form-item>
                <el-form-item label="可用天数">
                    <el-input v-model="form.days"></el-input>
                    <hd-error :message="form.errors.days" />
                </el-form-item>
            </el-form>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>套餐选择</span>
            </div>
            <el-table ref="multipleTable" :data="packages" tooltip-effect="dark" @selection-change="handleSelectionPackageChange">
                <el-table-column type="selection" width="55"> </el-table-column>
                <el-table-column label="编号" width="120">
                    <template slot-scope="scope">{{ scope.row.id }}</template>
                </el-table-column>
                <el-table-column prop="title" label="套餐名称"> </el-table-column>
                <el-table-column label="可用模块" width="120"> 可用模块 </el-table-column>
            </el-table>
        </el-card>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </div>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
const form = { title: '', site_num: 3, days: 365, packages: [] }
export default {
    props: ['packages'],
    data() {
        return {
            form: this.$inertia.form(this.$page.props.group || form),
            groupPackages: [],
            tabs
        }
    },
    mounted() {
        //编辑时让套餐选中
        if (this.form.id) {
            this.form.packages = this.form.packages.map(p => {
                p = this.packages.find(pa => pa.id == p.id)
                if (p) this.$refs.multipleTable.toggleRowSelection(p)
                return p.id
            })
        }
    },
    methods: {
        onSubmit() {
            const url = this.form.id ? route('system.group.update', this.form.id) : route('system.group.store')
            this.form[this.form.id ? 'put' : 'post'](url)
        },
        //选择套餐
        handleSelectionPackageChange(packages) {
            this.form.packages = packages.map(p => p.id)
        }
    }
}
</script>

<style></style>
