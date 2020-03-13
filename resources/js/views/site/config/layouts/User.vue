<template>
  <div class="card">
    <div class="card-body">
      <el-form :model="form" ref="form" label-width="120px">
        <el-form-item :label="form.user.bind.title">
          <el-checkbox-group v-model="form.user.bind.value">
            <el-checkbox label="email">邮箱</el-checkbox>
            <el-checkbox label="mobile">手机号</el-checkbox>
          </el-checkbox-group>
        </el-form-item>
        <el-form-item :label="form.user.avatar.title">
          <el-radio-group v-model="form.user.avatar.value" class="align-baseline">
            <el-radio label="1">开启</el-radio>
            <el-radio label="0">关闭</el-radio>
          </el-radio-group>
        </el-form-item>
        <el-form-item :label="form.user.timeout.title" class="col-12 col-md-5">
          <el-input v-model="form.user.timeout.value" :placeholder="form.user.timeout.desc">
            <template slot="append">秒</template>
          </el-input>
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
