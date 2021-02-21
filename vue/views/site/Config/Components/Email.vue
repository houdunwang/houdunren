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
                <el-input v-model="form.email.username" placeholder="发送邮箱帐号" show-password></el-input>
            </el-form-item>
            <el-form-item label="邮箱密码">
                <el-input v-model="form.email.password" placeholder="" show-password></el-input>
            </el-form-item>
            <el-form-item label="加密方式">
                <el-input v-model="form.email.encryption" placeholder="端口为465时请设置为SSL"></el-input>
            </el-form-item>
            <el-button type="danger" class="mt-3" size="mini" @click="send">发送测试邮件</el-button>
            <hd-tip>
                系统将向你的邮箱发送验证码短信，你需要保证你的帐号已经设置邮箱。你可以访问
                <router-link to="/system/my/edit" class="text-blue-700">我的资料</router-link> 设置邮箱
            </hd-tip>
        </el-card>
    </div>
</template>

<script>
export default {
    route: false,
    inject: ['form'],
    methods: {
        async send() {
            await this.axios.post(`site/${this.$route.params.sid}/code/email`)
        }
    }
}
</script>

<style></style>
