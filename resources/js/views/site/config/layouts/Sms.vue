<template>
  <div class="card mt-3">
    <div class="card-header">阿里云设置</div>
    <div class="card-body">
      <el-form :model="form" ref="form" label-width="120px">
        <el-form-item :label="form.sms.aliyun.sign.title">
          <el-input v-model="form.sms.aliyun.sign.value" :placeholder="form.sms.aliyun.sign.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.sms.aliyun.template.title">
          <el-input
            v-model="form.sms.aliyun.template.value"
            :placeholder="form.sms.aliyun.template.desc"
          ></el-input>
        </el-form-item>
        <el-form-item :label="form.sms.aliyun.vars.title">
          <el-input v-model="form.sms.aliyun.vars.value" :placeholder="form.sms.aliyun.vars.desc"></el-input>
        </el-form-item>
        <el-form-item :label="form.sms.aliyun.test_mobile.title">
          <el-input
            v-model="form.sms.aliyun.test_mobile.value"
            :placeholder="form.sms.aliyun.test_mobile.desc"
          >
            <template slot="append">
              <a href>发送测试短信</a>
            </template>
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
