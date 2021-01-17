<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-table :data="lessons.data" border stripe>
            <el-table-column v-for="col in columns" :prop="col.prop" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column width="150" #default="{row:lesson}">
                <el-button-group>
                    <el-button type="primary" size="mini" @click="$inertia.get(route('Edu.admin.lesson.edit', lesson))">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(lesson)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <el-pagination class="mt-3" :current-page="lessons.current_page" @current-change="currentChange" :total="lessons.total" background> </el-pagination>
    </hd-layout>
</template>

<script>
import tabs from './tabs.js'
const columns = [
    { label: '编号', prop: 'id', width: 80 },
    { label: '标题', prop: 'title' },
    { label: '视频数量', prop: 'video_num', width: 100 },
    { label: '浏览量', prop: 'read_num', width: 100 },
    { label: '点赞数', prop: 'favour_count', width: 100 },
    { label: '收藏数', prop: 'favorite_count', width: 100 },
    { label: '评论数', prop: 'comment_num', width: 100 },
    { label: '售价', prop: 'price', width: 100 }
]
export default {
    props: ['lessons'],
    data() {
        return {
            tabs,
            columns
            // lessonData: this.lessons ? this.lessons.data : []
        }
    },
    methods: {
        currentChange(page) {
            this.$inertia.get(route('Edu.admin.lesson.index', { page }))
        },
        del(lesson) {
            this.$confirm('确定删除吗', '温馨提示').then(() => {
                this.$inertia.delete(route('Edu.admin.lesson.destroy', lesson))
            })
        }
    }
}
</script>

<style></style>
