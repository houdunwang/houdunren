<template>
    <hd-layout :tabs="tabs" home="system.home">
        <el-table :data="groups" border class="shadow-sm" stripe>
            <el-table-column prop="id" label="编号" width="180"> </el-table-column>
            <el-table-column prop="title" label="会员组"> </el-table-column>
            <el-table-column prop="site_nums" label="可创建的站点数量"> </el-table-column>
            <el-table-column prop="title" label="会员组"> </el-table-column>
            <el-table-column prop="操作" label="" width="160" align="center" #default="{ row: group }">
                <el-button-group>
                    <el-button type="primary" size="small" @click="$inertia.get(route('system.group.edit', group))">
                        编辑
                    </el-button>
                    <el-button type="success" size="small" @click="del(group)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: ['groups'],
    data() {
        return {
            tabs
        }
    },
    methods: {
        del(group) {
            this.$confirm('确定删除会员组吗？', '提示').then(() => {
                this.$inertia.delete(route('system.group.destroy', group))
            })
        }
    }
}
</script>

<style></style>
