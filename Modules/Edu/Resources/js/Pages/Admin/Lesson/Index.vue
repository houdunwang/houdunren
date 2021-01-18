<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <lesson v-model="lessons.data" #default="{lesson}">
            <el-button-group>
                <el-button type="primary" size="mini" @click="$inertia.get(route('Edu.admin.lesson.edit', lesson))">编辑</el-button>
                <el-button type="danger" size="mini" @click="del(lesson)">删除</el-button>
            </el-button-group>
        </lesson>
        <!-- <el-table :data="lessons.data" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:lesson}">
                <el-image v-if="col.id == 'thumb'" :src="lesson.thumb" fit="fill" :lazy="true" />
                <span v-else>
                    {{ lesson[col.id] }}
                </span>
            </el-table-column>
            <el-table-column width="150" #default="{row:lesson}">
                <el-button-group>
                    <el-button type="primary" size="mini" @click="$inertia.get(route('Edu.admin.lesson.edit', lesson))">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(lesson)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table> -->
        <el-pagination class="mt-3" :current-page="lessons.current_page" @current-change="currentChange" :total="lessons.total" background> </el-pagination>
    </hd-layout>
</template>

<script>
import tabs from './tabs.js'
import columns from './columns'
export default {
    props: ['lessons'],
    data() {
        return {
            tabs,
            columns
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
