<template>
    <div>
        <tab :tabs="tabs" />
        <el-table :data="categories" border stripe>
            <el-table-column prop="id" label="编号" width="80" />
            <el-table-column prop="title" label="栏目名称" #default="{row:category}">
                {{ '-'.repeat(category.level * 2) }}
                {{ category.title }}
            </el-table-column>
            <!-- <el-table-column prop="path" label="多级路径" /> -->
            <el-table-column #default="{row:model}" label="创建者">
                {{ model.user.name }}
            </el-table-column>
            <el-table-column label="栏目介绍" #default="{row:category}" width="300">
                {{ category.description | truncate }}
            </el-table-column>
            <el-table-column label="模型" #default="{row:category}" width="150">
                <router-link :to="{ name: 'admin.model.edit', params: { id: category.model.id } }" class="text-gray-500 hover:text-gray-800">
                    {{ category.model.title }}
                </router-link>
            </el-table-column>
            <el-table-column label="预览图" #default="{row:category}" width="150">
                <div v-if="category.preview">
                    <el-popover placement="top-start" width="200" height="200" trigger="hover">
                        <img slot="reference" :src="category.preview" class="w-16 h-8 object-cover" />
                        <div>
                            <img :src="category.preview" class="w-full h-20 object-cover" />
                        </div>
                    </el-popover>
                </div>
            </el-table-column>
            <el-table-column label="类型" #default="{row:category}" width="150">
                <el-tag size="mini" :type="category.type <= 2 ? 'success' : 'danger'">{{ category.typeTitle }}</el-tag>
            </el-table-column>
            <el-table-column label="" #default="{row:category}" width="180" align="right">
                <el-button-group>
                    <el-button type="success" size="mini" @click="router('admin.category.edit', { id: category.id })">编辑</el-button>
                    <el-button type="danger" size="mini">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
const columns = [
    { label: '编号', id: 'id', width: 100 },
    { label: '栏目名称', id: 'title', width: 100 },
    { label: '编', id: 'id', width: 100 },
    { label: '编号', id: 'id', width: 100 }
]
export default {
    data() {
        return { tabs, categories: [] }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
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
