<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <el-form-item label="上传驱动">
                <el-radio-group v-model="form.upload.drive">
                    <el-radio label="local">本地上传</el-radio>
                    <el-radio label="oss">阿里云OSS</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="文件大小">
                <el-input v-model="form.upload.file_size" placeholder="允许上传的文件大小,单位KB "></el-input>
            </el-form-item>
            <el-form-item label="上传类型">
                <el-input v-model="form.upload.extensions" placeholder="请用英文半角逗号分隔文件类型"></el-input>
            </el-form-item>
        </el-card>
    </div>
</template>

<script>
export default {
    inject: ['form']
}
</script>

<style>
</style>
