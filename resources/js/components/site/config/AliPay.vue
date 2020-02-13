<template>
    <el-form label-width="120px">
        <el-form-item :label="field.alipay.app_id.title">
            <el-input
                v-model="field.alipay.app_id.value"
                :placeholder="field.alipay.app_id.desc"
            ></el-input>
        </el-form-item>

        <el-form-item :label="field.alipay.charset.title">
            <el-input
                v-model="field.alipay.charset.value"
                :placeholder="field.alipay.charset.desc"
            ></el-input>
        </el-form-item>

        <el-form-item :label="field.alipay.sign_type.title">
            <el-input
                v-model="field.alipay.sign_type.value"
                :placeholder="field.alipay.sign_type.desc"
            ></el-input>
        </el-form-item>

        <el-form-item :label="field.alipay.gatewayUrl.title">
            <el-input
                v-model="field.alipay.gatewayUrl.value"
                :placeholder="field.alipay.gatewayUrl.desc"
            ></el-input>
        </el-form-item>

        <el-form-item :label="field.alipay.merchant_private_key.title">
            <el-input
                type="textarea"
                rows="3"
                v-model="field.alipay.merchant_private_key.value"
                :placeholder="field.alipay.merchant_private_key.desc"
            ></el-input>
        </el-form-item>

        <el-form-item :label="field.alipay.alipay_public_key.title">
            <el-input
                type="textarea"
                rows="3"
                v-model="field.alipay.alipay_public_key.value"
                :placeholder="field.alipay.alipay_public_key.desc"
            ></el-input>
        </el-form-item>

    </el-form>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "Base",
        computed: {
            ...mapState('site', {field: 'config'})
        }
    }
</script>

<style scoped>

</style>
