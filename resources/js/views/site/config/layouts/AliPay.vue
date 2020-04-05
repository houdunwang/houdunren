<template>
  <a-form-model :model="form" :label-col="{ span: 3 }" :wrapper-col="{ span: 12 }">
    <a-card title="支付宝配置" size="small">
      <a-form-model-item :label="form.alipay.app_id.title">
        <a-input v-model="form.alipay.app_id.value" :placeholder="form.alipay.app_id.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.alipay.charset.title">
        <a-input v-model="form.alipay.charset.value" :placeholder="form.alipay.charset.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.alipay.sign_type.title">
        <a-input v-model="form.alipay.sign_type.value" :placeholder="form.alipay.sign_type.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.alipay.gatewayUrl.title">
        <a-input v-model="form.alipay.gatewayUrl.value" :placeholder="form.alipay.gatewayUrl.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.alipay.merchant_private_key.title">
        <a-input
          type="textarea"
          v-model="form.alipay.merchant_private_key.value"
          :placeholder="form.alipay.merchant_private_key.desc"
        />
      </a-form-model-item>
      <a-form-model-item :label="form.alipay.alipay_public_key.title">
        <a-input
          type="textarea"
          v-model="form.alipay.alipay_public_key.value"
          :placeholder="form.alipay.alipay_public_key.desc"
        />
      </a-form-model-item>
    </a-card>
  </a-form-model>
</template>

<script>
export default {
  props: { form: Object }
}
</script>
