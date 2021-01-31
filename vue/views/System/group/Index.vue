<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="groups" border class="shadow-sm" stripe v-loading="loading">
            <el-table-column prop="id" label="编号" width="180"> </el-table-column>
            <el-table-column prop="title" label="会员组"> </el-table-column>
            <el-table-column prop="site_num" label="可创建的站点数量"> </el-table-column>
            <el-table-column prop="days" label="站点可用开数"> </el-table-column>
            <el-table-column label="套餐" #default="{row:group}">
                <router-link :to="`/system/package/${p.id}/edit`" class="badge bg-cyan mr-1" v-for="(p, index) in group.packages" :key="index">
                    {{ p.title }}
                </router-link>
            </el-table-column>

            <el-table-column width="160" align="center" #default="{ row: group }">
                <el-button-group>
                    <el-button type="primary" size="small" @click="$router.push({ name: 'system.group.edit', params: { id: group.id } })">
                        编辑
                    </el-button>
                    <el-button type="danger" size="small" @click="del(group)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            groups: [],
            loading: true
        }
    },
    async created() {
        this.groups = await this.axios.get(`group`)
        this.loading = false
    },
    methods: {
        del(group) {
            this.$confirm('确定删除会员组吗？').then(async () => {
                await this.axios.delete(`group/${group.id}`)
                this.groups.splice(this.groups.indexOf(group), 1)
            })
        }
    }
}
</script>

<style></style>
