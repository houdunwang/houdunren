<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="packages" border v-loading="loading">
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
                    <el-button type="primary" size="small" @click="$router.push({ name: 'system.package.edit', params: { id: p.id } })">
                        编辑
                    </el-button>
                    <el-button type="success" size="small" @click="del(p)">删除</el-button>
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
        this.packages = await this.axios.get(`package`)
        this.loading = false
    },
    methods: {
        del(p) {
            this.$confirm('确定删除套餐吗？', '提示').then(async () => {
                await this.axios.delete(`package/${p.id}`)
                this.$router.go(0)
            })
        }
    }
}
</script>

<style></style>
