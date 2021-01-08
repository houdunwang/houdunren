<template>
    <hd-layout :tabs="tabs" home="system.home">
        <el-table :data="packages" border>
            <el-table-column prop="id" label="编号" width="180" />
            <el-table-column prop="title" label="套餐名称" />
            <el-table-column prop="days" label="可用天数" width="160" align="center" />
            <el-table-column label="可用模块" v-slot="{ row: pack }">
                <el-tag type="success" v-for="module in pack.modules" :key="module.id" class="mr-2 mb-2">
                    {{ module.title }}
                </el-tag>
            </el-table-column>
            <el-table-column label="操作" width="160" align="center">
                <template slot-scope="scope">
                    <el-button-group>
                        <el-button type="primary" size="small" @click="$inertia.get(route('system.package.edit', { id: scope.row.id }))">
                            编辑
                        </el-button>
                        <el-button type="success" size="small" @click="del(scope.row.id)">删除</el-button>
                    </el-button-group>
                </template>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>
<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            packages: this.$page.props.packages
        }
    },
    methods: {
        del(id) {
            this.$confirm('确定删除套餐吗？', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消',
                type: 'warning'
            }).then(() => {
                this.$inertia.delete(route('system.package.destroy', { id }))
            })
        }
    }
}
</script>

<style></style>
