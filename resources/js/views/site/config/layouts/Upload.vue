<template>
  <div class="card">
    <div class="card-body">
      <el-form ref="form" label-width="120px">
        <el-form-item :label="field.upload.drive.title">
          <el-radio-group v-model="field.upload.drive.value" class="align-baseline">
            <el-radio label="local">本地上传</el-radio>
            <el-radio label="oss">阿里云OSS</el-radio>
          </el-radio-group>
        </el-form-item>

        <el-form-item :label="field.upload.file_size.title">
          <el-input
            v-model="field.upload.file_size.value"
            :placeholder="field.upload.file_size.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="field.upload.type.title">
          <el-input v-model="field.upload.type.value" :placeholder="field.upload.type.desc"></el-input>
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
