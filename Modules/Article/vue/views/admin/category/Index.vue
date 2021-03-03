<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="categories" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: '' },
    data() {
        return { tabs, categories: [] }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.categories = await axios.get(`category`)
        },
        async del(category) {
            this.$confirm(`确定删除【${category.title}】吗？删除栏目将删除栏目下的所有文章`, '温馨提示').then(async _ => {
                await axios.delete(`category/${category.id}`)
                this.$router.go(0)
            })
        }
    }
}
</script>

<style></style>
