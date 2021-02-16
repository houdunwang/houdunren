<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="packages" border v-loading="loading">
            <el-table-column prop="id" label="编号" width="100" />
            <el-table-column prop="title" label="套餐名称" />
            <el-table-column label="会员组" v-slot="{ row: p }">
                <el-tag
                    type="primary"
                    effect="plain"
                    size="mini"
                    v-for="group in p.groups"
                    :key="group.id"
                    class="mr-2 mb-2 cursor-pointer"
                    @click="$router.push({ name: 'system.group.edit', params: { id: group.id } })"
                >
                    {{ group.title }}
                </el-tag>
            </el-table-column>
            <el-table-column label="可用模块" v-slot="{ row: p }">
                <el-tag
                    type="danger"
                    size="mini"
                    effect="plain"
                    v-for="module in p.modules"
                    :key="module.id"
                    class="mr-2 mb-2 cursor-pointer"
                    @click="$router.push({ name: 'system.module.index' })"
                >
                    {{ module.title }}
                </el-tag>
            </el-table-column>
            <el-table-column prop="days" label="可用天数" width="160" align="center" />
            <el-table-column label="操作" width="160" align="center" #default="{row:p}">
                <el-button-group>
                    <el-button type="primary" size="small" @click="$router.push({ name: 'system.package.edit', params: { id: p.id } })">
                        编辑
                    </el-button>
                    <el-button :type="p.id == 1 ? 'info' : 'danger'" size="small" @click="del(p)" :disabled="p.id == 1">删除</el-button>
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
            packages: [],
            loading: true
        }
    },
    async created() {
        this.packages = await this.axios.get(`system/package`)
        this.loading = false
    },
    methods: {
        del(p) {
            this.$confirm('确定删除套餐吗？', '提示').then(async () => {
                await this.axios.delete(`system/package/${p.id}`)
                this.$router.go(0)
            })
        }
    }
}
</script>

<style></style>
