<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>驱动选择</template>
            <el-form-item label="驱动选择">
                <el-radio-group v-model="form.sms.driver">
                    <el-radio label="aliyun">阿里云</el-radio>
                </el-radio-group>
                <el-radio-group v-model="form.sms.driver">
                    <el-radio label="tencent">腾讯云</el-radio>
                </el-radio-group>
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3" v-if="form.sms.driver == 'aliyun'">
            <template v-slot:header>阿里云</template>
            <el-alert type="info" class="mb-3 border text-md" closable>
                <div class="text-md">
                    1. 请访问阿里云后台获取
                    <a class="text-primary" href="https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign">
                        https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign
                    </a>
                    <br />
                    2. 短信模块必须存在以下变量： product:网站名称，code:验证码，系统会在发送验证码时自动设置数据
                </div>
            </el-alert>
            <el-form-item label="短信签名">
                <el-input v-model="form.sms.aliyun.sign" placeholder="请登录阿里云查看短信签名"></el-input>
                <hd-tip>
                    阿里云签名列表
                    <a href="https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign">
                        https://dysms.console.aliyun.com/dysms.htm#/domestic/text/sign
                    </a>
                </hd-tip>
            </el-form-item>
            <el-form-item label="验证码模板">
                <el-input v-model="form.sms.aliyun.template" placeholder="请登录阿里云查看获取验证码模板"></el-input>
                <hd-tip>
                    阿里云模板列表
                    <a href="https://dysms.console.aliyun.com/dysms.htm#/domestic/text/template">
                        https://dysms.console.aliyun.com/dysms.htm#/domestic/text/template
                    </a>
                </hd-tip>
            </el-form-item>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3" v-if="form.sms.driver == 'tencent'">
            <template v-slot:header>腾讯云</template>
            近期添加
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
