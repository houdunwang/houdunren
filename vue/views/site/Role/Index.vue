<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-alert type="info"> <i class="fa fa-info-circle" aria-hidden="true"></i> 您正在管理【 {{ site.title }}】站点 </el-alert>

        <el-table :data="roles" style="width: 100%" border class="mt-3" v-loading="loading">
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="title" label="角色名称"> </el-table-column>
            <el-table-column prop="name" label="角色标识"> </el-table-column>
            <el-table-column width="250" align="center" v-slot="{ row: role }">
                <el-button-group class="text-white">
                    <el-button type="success" size="mini" @click="$router.push({ name: 'site.role.edit', params: { sid, id: role.id } })">
                        编辑
                    </el-button>
                    <el-button type="danger" size="mini" @click="del(role)">删除</el-button>
                    <el-button type="primary" size="mini" @click="$router.push({ name: 'site.permission.edit', params: { sid, rid: role.id } })">
                        权限设置
                    </el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: `:sid/role` },
    data() {
        return {
            tabs: tabs({ sid: this.$route.params.sid }),
            site: {},
            roles: [],
            sid: this.$route.params.sid,
            loading: true
        }
    },
    async created() {
        this.site = await this.axios.get(`site/site/${this.sid}`)
        this.roles = await this.axios.get(`site/${this.sid}/role`)
        this.loading = false
    },
    methods: {
        async del(role) {
            await this.$confirm('确定删除角色吗', '温馨提示')
            await this.axios.delete(`site/${this.sid}/role/${role.id}`)
            this.roles.splice(this.roles.indexOf(role), 1)
        }
    }
}
</script>

<style></style>
