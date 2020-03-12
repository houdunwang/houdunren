<template>
  <el-form :model="form" ref="form" label-width="120px">
    <div class="card">
      <div class="card-body">
        <el-form-item :label="form.notification.timeout.title">
          <el-input v-model="form.notification.timeout.value" :placeholder="form.notification.timeout.desc">
            <template slot="append">秒</template>
          </el-input>
        </el-form-item>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">阿里云设置</div>
      <div class="card-body">
        <el-form-item :label="form.notification.aliyun.sign.title">
          <el-input
            v-model="form.notification.aliyun.sign.value"
            :placeholder="form.notification.aliyun.sign.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="form.notification.aliyun.template.title">
          <el-input
            v-model="form.notification.aliyun.template.value"
            :placeholder="form.notification.aliyun.template.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="form.notification.aliyun.vars.title">
          <el-input
            v-model="form.notification.aliyun.vars.value"
            :placeholder="form.notification.aliyun.vars.desc"
          ></el-input>
        </el-form-item>

        <el-form-item :label="form.notification.aliyun.test_mobile.title">
          <el-input
            v-model="form.notification.aliyun.test_mobile.value"
            :placeholder="form.notification.aliyun.test_mobile.desc"
          >
            <template slot="append">
              <a href>发送测试短信</a>
            </template>
          </el-input>
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
