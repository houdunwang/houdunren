<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="tags" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:tag}">
                <span v-if="col.id == 'created_at' || col.id == 'updated_at'">
                    {{ tag[col.id] | dateFormat }}
                </span>
                <span v-else-if="col.id == 'user'">
                    {{ tag.user.name }}
                </span>
                <span v-else>
                    {{ tag[col.id] }}
                </span>
            </el-table-column>
            <el-table-column width="250" #default="{row:tag}" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="router('admin.tag.edit', { id: tag.id })">编辑</el-button>
                    <el-button type="primary" size="mini" @click="del(tag)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
const columns = [
    { id: 'id', label: '编号', width: 100 },
    { id: 'title', label: '标签名称' },
    { id: 'user', label: '创建者', width: 100 },
    { id: 'created_at', label: '创建时间', width: 200 },
    { id: 'updated_at', label: '修改时间', width: 200 }
]
import tabs from './tabs'
export default {
    data() {
        return { tabs, tags: [], columns }
    },
    async created() {
        this.tags = await axios.get(`tag`)
    },
    methods: {
        async del(tag) {
            this.$confirm(`确定删除【${tag.title}】吗？`, '温馨提示').then(async _ => {
                await axios.delete(`tag/${tag.id}`)
                this.tags.splice(this.tags.indexOf(tag), 1)
            })
        }
    }
}
</script>

<style></style>
