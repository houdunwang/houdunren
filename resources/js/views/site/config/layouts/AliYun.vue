<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" label-width="120px">
        <el-form-item :label="form.aliyun.regionId.title">
          <el-input v-model="form.aliyun.regionId.value" :placeholder="form.aliyun.regionId.desc"></el-input>
        </el-form-item>

        <el-form-item :label="form.aliyun.accessKeyId.title">
          <el-input v-model="form.aliyun.accessKeyId.value" :placeholder="form.aliyun.accessKeyId.desc"></el-input>
        </el-form-item>

        <el-form-item :label="form.aliyun.accessKeySecret.title">
          <el-input
            v-model="form.aliyun.accessKeySecret.value"
            :placeholder="form.aliyun.accessKeySecret.desc"
          ></el-input>
        </el-form-item>

        <el-divider>
          <i class="el-icon-mobile-phone"></i>
        </el-divider>

        <el-form-item :label="form.aliyun.upload.endpoint.title">
          <el-input
            v-model="form.aliyun.upload.endpoint.value"
            :placeholder="form.aliyun.upload.endpoint.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="form.aliyun.upload.bucket.title">
          <el-input v-model="form.aliyun.upload.bucket.value" :placeholder="form.aliyun.upload.bucket.desc"></el-input>
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
