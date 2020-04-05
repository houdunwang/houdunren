<template>
  <a-form-model :model="form" :label-col="{ span: 3 }" :wrapper-col="{ span: 10 }">
    <a-card title="访问令牌" size="small">
      <a-form-model-item :label="form.wepay.mch_id.title">
        <a-input v-model="form.wepay.mch_id.value" :placeholder="form.wepay.mch_id.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.wepay.key.title">
        <a-input v-model="form.wepay.key.value" :placeholder="form.wepay.key.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.wepay.apiclient_cert.title">
        <a-input v-model="form.wepay.apiclient_cert.value" :placeholder="form.wepay.apiclient_cert.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.wepay.apiclient_key.title">
        <a-input v-model="form.wepay.apiclient_key.value" :placeholder="form.wepay.apiclient_key.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.wepay.rootca.title">
        <a-input v-model="form.wepay.rootca.value" :placeholder="form.wepay.rootca.desc" />
      </a-form-model-item>
    </a-card>
  </a-form-model>
</template>

<script>
export default {
  props: { form: Object }
}
</script>
