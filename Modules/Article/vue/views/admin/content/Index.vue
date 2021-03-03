<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="contents.data" border stripe v-if="contents.data">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:content}">
                <span v-if="col.id == 'created_at' || col.id == 'updated_at'">
                    {{ content[col.id] | dateFormat }}
                </span>
                <div v-else-if="col.id == 'tags'">
                    <el-tag size="mini" v-for="tag in content.tags" :key="tag.id" class="mr-2">
                        {{ tag.title }}
                    </el-tag>
                </div>
                <div v-else-if="col.id == 'thumb'">
                    <el-popover placement="top-start" width="200" height="200" trigger="hover">
                        <img slot="reference" :src="content.thumb" class="w-8 h-8 object-cover" />
                        <div>
                            <img :src="content.thumb" class="w-full h-20 object-cover" />
                        </div>
                    </el-popover>
                </div>
                <span v-else>
                    {{ content[col.id] }}
                </span>
            </el-table-column>

            <el-table-column width="180" #default="{row:content}" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="router('admin.content.edit', { id: content.id })">编辑</el-button>
                    <el-button type="primary" size="mini" @click="del(content)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <div class="mt-3">
            <el-pagination
                v-if="contents.meta"
                background
                @current-change="load"
                :total="contents.meta.total"
                :page-size="contents.meta.per_page"
                :hide-on-single-page="true"
            >
            </el-pagination>
        </div>
    </div>
</template>

<script>
const columns = [
    { id: 'id', label: '编号', width: 80 },
    { id: 'title', label: '标题' },
    { id: 'tags', label: '标签' },
    { id: 'thumb', label: '缩略图', width: 100 },
    { id: 'created_at', label: '创建时间', width: 200 },
    { id: 'updated_at', label: '修改时间', width: 200 }
]
import tabs from './tabs'
export default {
    route: { path: '' },
    data() {
        return { tabs, contents: [], columns }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            console.log(page)

            this.contents = await axios.get(`content?page=${page}`)
        },
        async del(content) {
            this.$confirm(`确定删除【${content.title}】吗？`, '温馨提示').then(async _ => {
                await axios.delete(`content/${content.id}`)
                this.contents.splice(this.contents.indexOf(content), 1)
            })
        }
    }
}
</script>

<style></style>
