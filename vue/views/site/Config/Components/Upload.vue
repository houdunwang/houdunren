<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <el-form-item label="上传驱动">
                <el-radio-group v-model="form.upload.driver">
                    <el-radio label="local">本地上传</el-radio>
                    <el-radio label="oss">阿里云OSS</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="文件大小">
                <el-input v-model="form.upload.file_size" placeholder="允许上传的文件大小,单位为字节"></el-input>
            </el-form-item>
            <el-form-item label="上传类型">
                <el-input v-model="form.upload.extensions" placeholder="请用英文半角逗号分隔文件类型"></el-input>
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3" v-if="form.upload.driver == 'local'">
            <template v-slot:header>
                本地上传
            </template>
            <el-form-item label="保存目录">
                <el-input v-model="form.upload.local.path" placeholder=""></el-input>
                <hd-tip>可用的日期单位有: Y:年 m:月 d:日</hd-tip>
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3" v-if="form.upload.driver == 'oss'">
            <template v-slot:header>
                OSS
            </template>
            <el-form-item label="bucket">
                <el-input v-model="form.upload.oss.bucket" placeholder="请访问阿里云获取" show-password></el-input>
                <hd-tip>
                    访问阿里云查看块
                    <a href="https://oss.console.aliyun.com/bucket">
                        https://oss.console.aliyun.com/bucket
                    </a>
                </hd-tip>
            </el-form-item>
            <el-form-item label="endpoint">
                <el-input v-model="form.upload.oss.endpoint" placeholder="在阿里云后台中oss bucket中查看外网访问的EndPoint"></el-input>
                <hd-tip>
                    在所选 bucket 中查看 endpoint
                </hd-tip>
            </el-form-item>
        </el-card>
    </div>
</template>

<script>
export default { route: false, inject: ['form'] }
</script>

<style></style>
