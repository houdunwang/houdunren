<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">
        手机验证
      </div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item label="手机号">
            <el-input v-model="form.mobile"></el-input>
          </el-form-item>
          <el-form-item label="验证码">
            <el-input v-model="form.qq">
              <template slot="append">
                <span :style="{ cursor: 'pointer' }">发送验证码</span>
              </template>
            </el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="$emit('submit')">保存提交</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style></style>
