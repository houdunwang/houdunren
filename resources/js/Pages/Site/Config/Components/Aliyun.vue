<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>访问令牌</template>
            <el-form-item label="regionId">
                <el-input
                    v-model="form.aliyun.regionId"
                    placeholder="根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo"
                ></el-input>
                <hd-tip>
                    根据服务器所在区域进行选择
                    <a href="https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo">
                        https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo
                    </a>
                </hd-tip>
            </el-form-item>
            <el-form-item label="accessKeyId">
                <el-input v-model="form.aliyun.accessKeyId" placeholder="" show-password></el-input>
                <hd-tip>
                    请登录阿里云访问控制控制台查看
                    <a href="https://ram.console.aliyun.com/users">
                        https://ram.console.aliyun.com/users
                    </a>
                </hd-tip>
            </el-form-item>
            <el-form-item label="accessKeySecret">
                <el-input v-model="form.aliyun.accessKeySecret" placeholder="" show-password></el-input>
            </el-form-item>
        </el-card>
    </div>
</template>

<script>
export default {
    inject: ['form']
}
</script>

<style></style>
