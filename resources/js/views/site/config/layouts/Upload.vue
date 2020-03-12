<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" ref="form" label-width="120px">
        <el-form-item :label="form.upload.drive.title">
          <el-radio-group v-model="form.upload.drive.value" class="align-baseline">
            <el-radio label="local">本地上传</el-radio>
            <el-radio label="oss">阿里云OSS</el-radio>
          </el-radio-group>
        </el-form-item>

        <el-form-item :label="form.upload.file_size.title">
          <el-input v-model="form.upload.file_size.value" :placeholder="form.upload.file_size.desc"></el-input>
        </el-form-item>

        <el-form-item :label="form.upload.type.title">
          <el-input v-model="form.upload.type.value" :placeholder="form.upload.type.desc"></el-input>
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
