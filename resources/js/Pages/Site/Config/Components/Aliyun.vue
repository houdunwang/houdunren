<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>访问令牌</template>
            <el-form-item label="regionId">
                <el-input
                    v-model="form.aliyun.regionId"
                    placeholder="根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo"
                ></el-input>
            </el-form-item>
            <el-form-item label="accessKeyId">
                <el-input
                    v-model="form.aliyun.accessKeyId"
                    placeholder="如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"
                ></el-input>
            </el-form-item>
            <el-form-item label="accessKeySecret">
                <el-input
                    v-model="form.aliyun.accessKeySecret"
                    placeholder="如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"
                ></el-input>
            </el-form-item>
        </el-card>

        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <template v-slot:header>OSS</template>
            <el-form-item label="endpoint">
                <el-input
                    v-model="form.aliyun.oss.endpoint"
                    placeholder="在阿里云后台中oss数据块中查看外网访问的EndPoint"
                ></el-input>
            </el-form-item>
            <el-form-item label="bucket">
                <el-input v-model="form.aliyun.oss.bucket" placeholder="请访问阿里云获取"></el-input>
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
