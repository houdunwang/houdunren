<template>
    <layout>
        <el-table :data="groups" border>
            <el-table-column prop="id" label="编号" width="180"> </el-table-column>
            <el-table-column prop="title" label="会员组"> </el-table-column>
            <el-table-column prop="site_nums" label="可创建的站点数量"> </el-table-column>
            <el-table-column prop="title" label="会员组"> </el-table-column>
            <el-table-column prop="操作" label="" width="160" align="center">
                <template slot-scope="scope">
                    <el-button-group>
                        <el-button
                            type="primary"
                            size="small"
                            @click="$inertia.get(route('system.group.edit', { id: scope.row.id }))"
                        >
                            编辑
                        </el-button>
                        <el-button type="success" size="small" @click="del(scope.row)">删除</el-button>
                    </el-button-group>
                </template>
            </el-table-column>
        </el-table>
    </layout>
</template>

<script>
import Layout from "./Layout";
export default {
    components: { Layout },
    data() {
        return {
            groups: this.$page.groups,
        };
    },
    methods: {
        del(p) {
            this.$confirm("确定删除套餐吗？", "提示", {
                confirmButtonText: "确定",
                cancelButtonText: "取消",
                type: "warning",
            }).then(() => {
                this.$inertia.delete(route("system.group.destroy", { id: p.id }));
            });
        },
    },
};
</script>

<style>
</style>
