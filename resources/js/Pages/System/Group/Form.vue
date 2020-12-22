<template>
    <layout>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <el-form :model="form" ref="form" label-width="120px" :inline="false" size="normal">
                <el-form-item label="会员组名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.error('title')" />
                </el-form-item>

                <el-form-item label="站点数量">
                    <el-input v-model="form.site_nums"></el-input>
                    <hd-error :message="form.error('site_nums')" />
                </el-form-item>

                <el-form-item label="可用天数">
                    <el-input v-model="form.days"></el-input>
                    <hd-error :message="form.error('days')" />
                </el-form-item>
            </el-form>
        </el-card>

        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>套餐选择</span>
            </div>
            <div>
                <el-table
                    ref="multipleTable"
                    :data="packages"
                    tooltip-effect="dark"
                    @selection-change="handleSelectionChange"
                >
                    <el-table-column type="selection" width="55"> </el-table-column>
                    <el-table-column label="编号" width="120">
                        <template slot-scope="scope">{{ scope.row.id }}</template>
                    </el-table-column>
                    <el-table-column prop="title" label="套餐名称"> </el-table-column>
                    <el-table-column label="可用模块" width="120"> 可用模块 </el-table-column>
                </el-table>
            </div>
        </el-card>

        <div class="mt-3">
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </div>
    </layout>
</template>

<script>
import Layout from "./Layout";
const form = { title: "", site_nums: 0, days: 365 };
export default {
    components: { Layout },
    props: ["packages"],
    data() {
        return {
            form: this.$inertia.form(this.$page.group || form),
            groupPackages: [],
        };
    },
    mounted() {
        //编辑时让原套餐选中
        if (this.form.id) {
            //已经选择的套餐
            const packages = this.packages.filter((p) => this.form._packages.includes(p.id));

            //切换选中的checkbox 表单
            packages.forEach((p) => {
                this.$refs.multipleTable.toggleRowSelection(p);
            });
        }
    },
    methods: {
        onSubmit() {
            const packages = this.groupPackages.map((p) => p.id);
            if (this.form.id) {
                //更新
                let url = route("system.group.update", {
                    id: this.form.id,
                });
                this.$inertia.put(url, { ...this.form, packages });
            } else {
                //添加
                let url = route("system.group.store");
                this.$inertia.post(url, { ...this.form, packages });
            }
        },
        //切换选择
        toggleSelection(rows) {
            if (rows) {
                rows.forEach((row) => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            } else {
                this.$refs.multipleTable.clearSelection();
            }
        },
        handleSelectionChange(val) {
            this.groupPackages = val;
        },
    },
};
</script>

<style></style>
