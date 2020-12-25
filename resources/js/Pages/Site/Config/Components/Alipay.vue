<template>
    <div>
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>支付宝配置</template>
            <el-form-item label="应用ID">
                <el-input
                    v-model="form.alipay.app_id"
                    placeholder="请登录支付定应用中心查看  https://open.alipay.com/platform/developerIndex.htm"
                ></el-input>
            </el-form-item>
            <el-form-item label="编码格式">
                <el-input v-model="form.alipay.charset" placeholder="编码格式一般使用UTF-8不需要更改"></el-input>
            </el-form-item>
            <el-form-item label="签名方式">
                <el-input v-model="form.alipay.sign_type" placeholder="签名方式一般不需要更改"></el-input>
            </el-form-item>
            <el-form-item label="商户私钥">
                <el-input
                    v-model="form.alipay.private_key"
                    placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
                ></el-input>
            </el-form-item>
            <el-form-item label="支付宝公钥">
                <el-input
                    v-model="form.alipay.ali_public_key"
                    placeholder="使用支付宝提供的签名生成工具创建，注意不要有换行"
                ></el-input>
            </el-form-item>
            <el-form-item label="运行模式">
                <el-input v-model="form.alipay.mode" placeholder="沙箱模式需要设置值为dev"></el-input>
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
