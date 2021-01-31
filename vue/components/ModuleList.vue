<template>
    <el-table :data="modules" border stripe>
        <el-table-column label="编号" prop="id" :width="100"> </el-table-column>
        <el-table-column label="预览图" :width="100" #default="{row:module}">
            <el-image :src="module.preview" fit="fill" :lazy="true" class="rounded w-12 h-12"></el-image>
        </el-table-column>
        <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
        <el-table-column :width="120" #default="{row:module}" align="center"> <slot :module="module" /> </el-table-column>
    </el-table>
</template>

<script>
const columns = [
    { id: 'name', label: '标识', width: 100 },
    { id: 'title', label: '模块名称' },
    { id: 'description', label: '模块介绍' },
    { id: 'author', label: '作者', width: 150 },
    { id: 'version', label: '版本号', width: 150 }
]
export default {
    props: ['modules'],
    data() {
        return {
            columns
        }
    }
}
</script>

<style></style>
