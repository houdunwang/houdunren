<template>
    <div v-loading="loading">
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header="">会员组资料</template>
            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
                <el-form-item label="会员组名称">
                    <el-input type="text" v-model="form.title"></el-input>
                    <hd-form-error message="title" />
                </el-form-item>
                <el-form-item label="站点数量">
                    <el-input type="text" v-model="form.site_num"></el-input>
                    <hd-form-error message="site_num" />
                </el-form-item>
                <el-form-item label="可用天数">
                    <el-input v-model="form.days"></el-input>
                    <hd-form-error message="days" />
                </el-form-item>
            </el-form>

            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <div slot="header">
                    可用的模块
                </div>
                <el-tag type="primary" effect="plain" size="mini" v-for="module in modules" :key="module.id" class="mr-2 mb-2 cursor-pointer">
                    {{ module.title }}
                </el-tag>
            </el-card>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>套餐选择</span>
            </div>
            <el-table ref="multipleTable" :data="packages" tooltip-effect="dark" @selection-change="handleSelectionPackageChange">
                <el-table-column type="selection" width="55"> </el-table-column>
                <el-table-column label="编号" width="120" v-slot="{ row: p }">
                    <template>{{ p.id }}</template>
                </el-table-column>
                <el-table-column prop="title" label="套餐名称"> </el-table-column>
                <el-table-column prop="site_num" label="站点数量"> </el-table-column>
                <el-table-column prop="days" label="可用天数"> </el-table-column>
                <el-table-column label="可用模块" #default="{row:p}">
                    {{ p.title }}
                </el-table-column>
            </el-table>
        </el-card>
        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </div>
    </div>
</template>

<script>
import tabs from './tabs'
const form = { title: '', site_num: 3, days: 365, packages: [] }
export default {
    route: false,
    props: ['id'],
    data() {
        return {
            form: Object.assign(form),
            packages: [],
            tabs,
            loading: true
        }
    },
    computed: {
        //当前可用模块
        modules() {
            const modules = []
            this.form.packages.forEach(p => {
                p.modules.forEach(m => modules.push(m))
            })
            return modules
        }
    },
    async created() {
        this.packages = await this.axios.get(`package`)
        //编辑时让套餐选中
        if (this.id) {
            this.form = await this.axios.get(`group/${this.id}`)
            const selectPackages = []
            this.packages.forEach(pac => {
                if (this.form.packages.some(p => p.id == pac.id)) {
                    selectPackages.push(pac)
                }
            })
            selectPackages.forEach(p => this.$refs.multipleTable.toggleRowSelection(p))
        }
        this.loading = false
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `group/${this.id}` : `group`
            await this.axios[this.id ? 'put' : 'post'](url, { ...this.form, packages: this.form.packages.map(p => p.id) })
            this.$router.push({ name: 'system.package.index' })
        },
        //选择套餐
        handleSelectionPackageChange(packages) {
            this.form.packages = packages
        }
    }
}
</script>

<style></style>
