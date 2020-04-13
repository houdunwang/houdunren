<template>
  <a-form-model :model="form" :label-col="{ span: 3 }" :wrapper-col="{ span: 8 }">
    <a-card title="用户相关配置" size="small" hoverable>
      <a-form-model-item :label="form.user.bind.title">
        <a-checkbox-group v-model="form.user.bind.value">
          <a-checkbox value="email" name="email">邮箱</a-checkbox>
          <a-checkbox value="mobile" name="mobile">手机号</a-checkbox>
        </a-checkbox-group>
      </a-form-model-item>
      <a-form-model-item :label="form.user.avatar.title">
        <a-radio-group v-model="form.user.avatar.value">
          <a-radio value="1">是</a-radio>
          <a-radio value="0">否</a-radio>
        </a-radio-group>
      </a-form-model-item>
      <a-form-model-item :label="form.user.timeout.title">
        <a-input suffix="秒" v-model="form.user.timeout.value" />
      </a-form-model-item>
    </a-card>
  </a-form-model>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style scoped></style>
