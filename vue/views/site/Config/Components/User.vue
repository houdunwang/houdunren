<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <el-form-item label="用户必须绑定">
                <el-checkbox-group v-model="form.user.bind">
                    <el-checkbox label="email">邮箱</el-checkbox>
                    <el-checkbox label="mobile">手机号</el-checkbox>
                </el-checkbox-group>
            </el-form-item>

            <el-form-item label="必须设置头像">
                <el-radio-group v-model="form.user.avatar">
                    <el-radio :label="true">是</el-radio>
                    <el-radio :label="false">否</el-radio>
                </el-radio-group>
            </el-form-item>
        </el-card>

        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span> 微信桌面登录</span>
            </div>
            <el-form-item label="微信登录">
                <el-radio-group v-model="form.user.wechatweb_login">
                    <el-radio :label="true">开启</el-radio>
                    <el-radio :label="false">关闭</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-card shadow="hover" :body-style="{ padding: '20px' }" v-show="form.user.wechatweb_login">
                <div slot="header">
                    微信公众平台
                    <hd-tip class="ml-2 inline-block">
                        配置桌面端微信登录
                    </hd-tip>
                </div>
                <el-form-item label="AppID">
                    <el-input v-model="form.user.wechatweb_client_id" placeholder="开放平台网站应用的APPID" show-password></el-input>
                </el-form-item>
                <el-form-item label="AppSecret">
                    <el-input v-model="form.user.wechatweb_client_secret" placeholder="开放平台网站应用的AppSecret" show-password></el-input>
                </el-form-item>
            </el-card>
            <el-card shadow="hover" :body-style="{ padding: '20px' }" class="mt-3" v-show="form.user.wechatweb_login">
                <div slot="header">
                    微信公众号
                    <hd-tip class="ml-2 inline-block">
                        配置微信客户端登录
                    </hd-tip>
                </div>
                <el-form-item label="AppID">
                    <el-input v-model="form.user.wechat_appid" placeholder="微信公众号APPID" show-password></el-input>
                </el-form-item>
                <el-form-item label="AppSecret">
                    <el-input v-model="form.user.wechat_appsecret" placeholder="微信公众号AppSecret" show-password></el-input>
                </el-form-item>
            </el-card>
        </el-card>
    </div>
</template>

<script>
export default {
    route: false,
    inject: ['form']
}
</script>

<style></style>
