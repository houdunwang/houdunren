<template>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
        <el-form-item label="关键词">
            <el-input v-model="form.base.keywords"></el-input>
        </el-form-item>
        <el-form-item label="网站描述">
            <el-input v-model="form.base.description"></el-input>
        </el-form-item>
        <el-form-item label="ICP备案号">
            <el-input v-model="form.base.icp"></el-input>
        </el-form-item>
        <el-form-item label="电话">
            <el-input v-model="form.base.tel"></el-input>
        </el-form-item>
        <el-form-item label="邮箱">
            <el-input v-model="form.base.email"></el-input>
        </el-form-item>
        <el-form-item label="统计代码">
            <el-input type="textarea" v-model="form.base.copyright" rows="3"></el-input>
        </el-form-item>
    </el-card>
</template>

<script>
export default { route: false, inject: ['form'] }
</script>

<style></style>
