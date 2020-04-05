<template>
  <a-form-model :model="form" :label-col="{ span: 4 }" :wrapper-col="{ span: 10 }">
    <a-alert message="使用OSS上传需要先设置阿里云" type="success" class="mb-2" />
    <a-card size="small" hoverable title="站点配置传配置">
      <a-form-model-item :label="form.upload.drive.value">
        <a-input v-model="form.upload.drive.value" :placeholder="form.upload.drive.value" />
      </a-form-model-item>
      <a-form-model-item :label="form.upload.drive.title">
        <a-radio-group v-model="form.upload.drive.value">
          <a-radio value="local">本地上传</a-radio>
          <a-radio value="oss">阿里云OSS</a-radio>
        </a-radio-group>
      </a-form-model-item>
      <a-form-model-item :label="form.upload.file_size.title">
        <a-input v-model="form.upload.file_size.value" :placeholder="form.upload.file_size.value" />
      </a-form-model-item>
      <a-form-model-item :label="form.upload.type.title">
        <a-input v-model="form.upload.type.value" :placeholder="form.upload.type.value" />
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
