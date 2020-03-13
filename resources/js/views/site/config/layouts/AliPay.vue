<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" label-width="120px">
        <el-form-item :label="form.alipay.app_id.title">
          <el-input v-model="form.alipay.app_id.value" :placeholder="form.alipay.app_id.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.alipay.charset.title">
          <el-input v-model="form.alipay.charset.value" :placeholder="form.alipay.charset.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.alipay.sign_type.title">
          <el-input v-model="form.alipay.sign_type.value" :placeholder="form.alipay.sign_type.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.alipay.gatewayUrl.title">
          <el-input
            v-model="form.alipay.gatewayUrl.value"
            :placeholder="form.alipay.gatewayUrl.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.alipay.merchant_private_key.title">
          <el-input
            type="textarea"
            rows="3"
            v-model="form.alipay.merchant_private_key.value"
            :placeholder="form.alipay.merchant_private_key.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.alipay.alipay_public_key.title">
          <el-input
            type="textarea"
            rows="3"
            v-model="form.alipay.alipay_public_key.value"
            :placeholder="form.alipay.alipay_public_key.desc"
          ></el-input>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style scoped></style>
