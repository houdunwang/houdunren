<template>
  <div class="card">
    <div class="card-body">
      <el-form label-width="120px">
        <el-form-item :label="field.aliyun.regionId.title">
          <el-input v-model="field.aliyun.regionId.value" :placeholder="field.aliyun.regionId.desc"></el-input>
        </el-form-item>

        <el-form-item :label="field.aliyun.accessKeyId.title">
          <el-input
            v-model="field.aliyun.accessKeyId.value"
            :placeholder="field.aliyun.accessKeyId.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="field.aliyun.accessKeySecret.title">
          <el-input
            v-model="field.aliyun.accessKeySecret.value"
            :placeholder="field.aliyun.accessKeySecret.desc"
          ></el-input>
        </el-form-item>

        <el-divider>
          <i class="el-icon-mobile-phone"></i>
        </el-divider>

        <el-form-item :label="field.aliyun.upload.endpoint.title">
          <el-input
            v-model="field.aliyun.upload.endpoint.value"
            :placeholder="field.aliyun.upload.endpoint.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="field.aliyun.upload.bucket.title">
          <el-input
            v-model="field.aliyun.upload.bucket.value"
            :placeholder="field.aliyun.upload.bucket.desc"
          ></el-input>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState('siteConfig', { field: 'data' })
  }
}
</script>

<style scoped></style>
