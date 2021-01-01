<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-alert type="info"> <i class="fa fa-info-circle" aria-hidden="true"></i> 你正在管理 {{ site.title }} 站点 </el-alert>

        <el-table :data="roles" style="width: 100%" border class="mt-3">
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="title" label="角色名称"> </el-table-column>
            <el-table-column prop="name" label="角色标识"> </el-table-column>
            <el-table-column width="250" align="center" v-slot="{ row: role }">
                <el-button-group>
                    <el-button type="success" size="mini">
                        <inertia-link :href="route('site.role.edit', [site, role])">编辑</inertia-link>
                    </el-button>
                    <el-button type="danger" size="mini" @click="del(role)">删除</el-button>
                    <el-button type="primary" size="mini">权限设置</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: ['site', 'roles'],
    data() {
        return {
            tabs: tabs(this.site)
        }
    },
    methods: {
        del(role) {
            this.$confirm('确定删除吗', '温馨提示').then(() => {
                this.$inertia.delete(route('site.role.destroy', [this.site, role]))
            })
        }
    }
}
</script>

<style></style>
