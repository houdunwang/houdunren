<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="models" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:model}">
                <span v-if="col.id == 'created_at' || col.id == 'updated_at'">
                    {{ model[col.id] | dateFormat }}
                </span>
                <span v-else>
                    {{ model[col.id] }}
                </span>
            </el-table-column>
            <el-table-column #default="{row:model}" label="创建者">
                {{ model.user.name }}
            </el-table-column>

            <el-table-column width="250" #default="{row:model}" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="router('admin.model.edit', { id: model.id })">编辑</el-button>
                    <el-button type="danger" size="mini" @click="router('admin.field.index', { mid: model.id })">字段管理</el-button>
                    <el-button type="primary" size="mini" @click="del(model)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
const columns = [
    { id: 'id', label: '编号', width: 100 },
    { id: 'title', label: '模型名称' },
    { id: 'created_at', label: '创建时间', width: 200 },
    { id: 'updated_at', label: '修改时间', width: 200 }
]
import tabs from './tabs'
export default {
    route: { path: '' },
    data() {
        return { tabs, models: [], columns }
    },
    async created() {
        this.models = await axios.get(`model`)
    },
    methods: {
        async del(model) {
            this.$confirm(`确定删除【${model.title}】吗？`, '温馨提示').then(async _ => {
                await axios.delete(`model/${model.id}`)
                this.models.splice(this.models.indexOf(model), 1)
            })
        }
    }
}
</script>

<style></style>
