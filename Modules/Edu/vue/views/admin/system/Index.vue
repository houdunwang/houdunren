<template>
    <div>
        <el-table :data="lessons.data" border stripe>
            <el-table-column v-for="col in columns" :prop="col.prop" :key="col.id" :label="col.label" :width="col.width" #default="{row:lesson}">
                <el-image v-if="col.prop == 'preview'" :src="lesson.preview" fit="cover" :lazy="true"></el-image>
                <span v-else>
                    {{ lesson[col.prop] }}
                </span>
            </el-table-column>
            <el-table-column width="150" #default="{row:lesson}">
                <el-button-group>
                    <el-button type="primary" size="mini" @click="$inertia.get(route('Edu.admin.system.edit', lesson))">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(lesson)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <el-pagination hide-on-single-page class="mt-3" :current-page="lessons.current_page" @current-change="load" :total="lessons.total" background>
        </el-pagination>
    </div>
</template>

<script>
import tabs from './tabs.js'
const columns = [
    { label: '编号', prop: 'id', width: 80 },
    { label: '课程名称', prop: 'title', width: 200 },
    { label: '预览图', prop: 'preview', width: 100 },
    { label: '课程介绍', prop: 'description' }
]
export default {
    data() {
        return {
            tabs,
            columns,
            lessons: []
        }
    },
    async created() {
        this.lessons = await this.load()
    },
    methods: {
        async load(page = 1) {
            await this.axios.get(`system?page=${page}`)
        },
        del(lesson) {
            this.$confirm('确定删除吗', '温馨提示').then(() => {
                this.axios.delete('system/destroy', lesson)
            })
        }
    }
}
</script>

<style></style>
