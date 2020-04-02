<template>
  <el-form :model="form" label-width="120px">
    <div class="card">
      <div class="card-header">访问令牌</div>
      <div class="card-body">
        <el-form-item :label="form.aliyun.regionId.title">
          <el-input v-model="form.aliyun.regionId.value" :placeholder="form.aliyun.regionId.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.aliyun.accessKeyId.title">
          <el-input
            v-model="form.aliyun.accessKeyId.value"
            :placeholder="form.aliyun.accessKeyId.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.aliyun.accessKeySecret.title">
          <el-input
            v-model="form.aliyun.accessKeySecret.value"
            :placeholder="form.aliyun.accessKeySecret.desc"
          ></el-input>
        </el-form-item>
      </div>
    </div>
    <div class="card mt-2">
      <div class="card-header">OSS</div>
      <div class="card-body">
        <el-form-item :label="form.aliyun.upload.endpoint.title">
          <el-input
            v-model="form.aliyun.upload.endpoint.value"
            :placeholder="form.aliyun.upload.endpoint.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.aliyun.upload.bucket.title">
          <el-input
            v-model="form.aliyun.upload.bucket.value"
            :placeholder="form.aliyun.upload.bucket.desc"
          ></el-input>
        </el-form-item>
      </div>
    </div>
  </el-form>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style scoped></style>
