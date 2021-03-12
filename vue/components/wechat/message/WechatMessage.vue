<template>
    <div>
        <el-table :data="message.data" border stripe v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="更新时间" width="150" #default="{row:message}">
                {{ message.updated_at | fromNow }}
            </el-table-column>
            <el-table-column width="160" align="center" v-slot="{ row: message }">
                <el-button-group class="text-white">
                    <el-button type="success" size="mini">编辑</el-button>
                    <el-button type="danger" size="mini">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>

        <div class="mt-3">
            <el-button type="primary" size="mini">添加消息</el-button>
        </div>
    </div>
</template>

<script>
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '规则名称', id: 'title' },
    { label: '关键词', id: 'keyword' },
    { label: '关键词类型', id: 'TypeTitle' }
]
export default {
    route: { path: `:sid/:wid/message` },
    props: {
        type: { type: String, default: 'text' }
    },
    data() {
        return { message: [], loading: true, columns, site: {} }
    },
    async created() {
        this.site = await axios.get(`site/${this.$route.params.sid}`)
        this.message = await this.axios.get(`site/${this.$route.params.sid}/wechat/${this.$route.params.wid}/message`)
        this.loading = false
    },
    methods: {
        async del(site) {
            this.$confirm('确定删除消息吗？', '提示').then(async _ => {
                await this.axios.delete(`site/${site.id}`, site)
                this.messages.splice(this.messages.indexOf(site), 1)
            })
        }
    }
}
</script>

<style></style>
