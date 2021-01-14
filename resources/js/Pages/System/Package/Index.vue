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
            <el-table-column label="操作" width="160" align="center" #default="{row:p}">
                <el-button-group>
                    <el-button type="primary" size="small" @click="$inertia.get(route('system.package.edit', p))">
                        编辑
                    </el-button>
                    <el-button type="success" size="small" @click="del(p)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>
<script>
import tabs from './tabs'
export default {
    props: ['packages'],
    data() {
        return {
            tabs
        }
    },
    methods: {
        del(p) {
            this.$confirm('确定删除套餐吗？', '提示', {
                type: 'warning'
            }).then(() => {
                this.$inertia.delete(route('system.package.destroy', p))
            })
        }
    }
}
</script>

<style></style>
