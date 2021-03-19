<template>
    <el-form :model="form" ref="form" label-position="top" label-width="80px" :inline="false" size="normal">
        <el-form-item label="">
            <el-form-item label="菜单名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="链接" v-if="!form.sub_button.length">
                <el-input v-model="form.url"></el-input>
            </el-form-item>
        </el-form-item>
    </el-form>
</template>

<script>
export default {
    props: ['form']
}
</script>

<style></style>
