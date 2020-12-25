<template>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
        <el-form-item label="邮箱驱动">
            <el-input
                v-model="form.email.transport"
                placeholder="smtp、sendmail、mailgun、mandrill、ses、sparkpost、log"
            ></el-input>
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
            <el-input v-model="form.email.password" placeholder=""></el-input>
        </el-form-item>
        <el-form-item label="加密方式">
            <el-input v-model="form.email.encryption" placeholder=""></el-input>
        </el-form-item>
    </el-card>
</template>

<script>
export default {
    inject: ['form']
}
</script>

<style>
</style>
