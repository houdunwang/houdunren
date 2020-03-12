<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" ref="form" label-width="120px">
        <el-form-item :label="form.user.drive.title">
          <el-checkbox-group v-model="form.user.drive.value">
            <el-checkbox label="email">邮箱注册</el-checkbox>
            <el-checkbox label="mobile">手机号注册</el-checkbox>
          </el-checkbox-group>
        </el-form-item>

        <el-form-item :label="form.user.captcha.title">
          <el-radio-group v-model="form.user.captcha.value">
            <el-radio label="1">开启</el-radio>
            <el-radio label="0">关闭</el-radio>
          </el-radio-group>
        </el-form-item>

        <el-form-item :label="form.user.avatar.title">
          <el-radio-group v-model="form.user.avatar.value">
            <el-radio label="1">开启</el-radio>
            <el-radio label="0">关闭</el-radio>
          </el-radio-group>
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
