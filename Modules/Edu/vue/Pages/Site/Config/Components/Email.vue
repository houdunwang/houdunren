<template>
    <div>
        <el-alert type="info" effect="light" closable class="mb-2">
            查看
            <a
                href=" https://houdunren.gitee.io/note/aliyun/3%20%E9%82%AE%E4%BB%B6%E6%9C%8D%E5%8A%A1.html#%E5%8F%91%E4%BF%A1%E5%9C%B0%E5%9D%80"
                class="text-blue-700"
                target="_blank"
                >后盾人文档</a
            >
            掌握如何邮箱邮箱
        </el-alert>

        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <el-form-item label="邮箱驱动">
                <el-input v-model="form.email.transport" placeholder="smtp、sendmail、mailgun、mandrill、ses、sparkpost、log"></el-input>
            </el-form-item>
            <el-form-item label="服务器地址">
                <el-input v-model="form.email.host" placeholder="指定SMTP服务器的地址 阿里邮箱 腾讯邮箱"></el-input>
            </el-form-item>
            <el-form-item label="端口">
                <el-input v-model="form.email.port" placeholder="指定SMTP服务器的地址, 如: 126邮箱为25"></el-input>
            </el-form-item>
            <el-form-item label="邮箱帐号">
                <el-input v-model="form.email.username" placeholder="发送邮箱帐号"></el-input>
            </el-form-item>
            <el-form-item label="邮箱密码">
                <el-input v-model="form.email.password" placeholder="" show-password></el-input>
            </el-form-item>
            <el-form-item label="加密方式">
                <el-input v-model="form.email.encryption" placeholder=""></el-input>
            </el-form-item>
        </el-card>
    </div>
</template>

<script>
export default { route: false, inject: ['form'] }
</script>

<style></style>
