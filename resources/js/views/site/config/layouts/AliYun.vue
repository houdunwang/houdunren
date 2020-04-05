<template>
  <a-form-model :model="form" :label-col="{ span: 3 }" :wrapper-col="{ span: 10 }">
    <a-card title="访问令牌" size="small">
      <a-form-model-item :label="form.aliyun.regionId.title">
        <a-input v-model="form.aliyun.regionId.value" :placeholder="form.aliyun.regionId.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.aliyun.accessKeyId.title">
        <a-input v-model="form.aliyun.accessKeyId.value" :placeholder="form.aliyun.accessKeyId.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.aliyun.accessKeySecret.title">
        <a-input v-model="form.aliyun.accessKeySecret.value" :placeholder="form.aliyun.accessKeySecret.desc" />
      </a-form-model-item>
    </a-card>
    <a-card title="OSS" class="mt-3" size="small">
      <a-form-model-item :label="form.aliyun.upload.endpoint.title">
        <a-input v-model="form.aliyun.upload.endpoint.value" :placeholder="form.aliyun.upload.endpoint.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.aliyun.upload.bucket.title">
        <a-input v-model="form.aliyun.upload.bucket.value" :placeholder="form.aliyun.upload.bucket.desc" />
      </a-form-model-item>
    </a-card>
  </a-form-model>
</template>

<script>
export default {
  props: { form: Object }
}
</script>
