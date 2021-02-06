<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-table :data="subscribes" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:subscribe}">
                <i v-if="col.id == 'icon'" :class="subscribe[col.id]"></i>
                <span v-else>
                    {{ subscribe[col.id] }}
                </span>
            </el-table-column>
            <el-table-column width="150" #default="{row:subscribe}">
                <el-button-group>
                    <el-button type="primary" size="mini" @click="$inertia.get(route('Edu.admin.subscribe.edit', subscribe))">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(subscribe)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>

<script>
import tabs from './tabs.js'
const columns = [
    { label: '编号', id: 'id', width: 80 },
    { label: '套餐标题', id: 'title', width: 200 },
    { label: '套餐介绍', id: 'ad' },
    { label: '图标', id: 'icon' },
    { label: '价格', id: 'price' },
    { label: '套餐月数', id: 'month' }
]
export default {
    props: ['subscribes'],
    data() {
        return {
            tabs,
            columns
        }
    },
    methods: {
        del(lesson) {
            this.$confirm('确定删除吗', '温馨提示').then(() => {
                this.$inertia.delete(route('Edu.admin.subscribe.destroy', lesson))
            })
        }
    }
}
</script>

<style></style>
