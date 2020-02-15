<template>
  <el-form ref="form" label-width="120px">
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>阿里云设置</span>
      </div>

      <el-row>
        <el-col :span="16">
          <el-form-item :label="field.notification.timeout.title">
            <el-input
              v-model="field.notification.timeout.value"
              :placeholder="field.notification.timeout.desc"
            >
              <template slot="append">秒</template>
            </el-input>
          </el-form-item>
        </el-col>
      </el-row>
    </el-card>

    <el-card class="box-card mt-3">
      <div slot="header" class="clearfix">
        <span>阿里云设置</span>
      </div>

      <el-row>
        <el-col :span="16">
          <el-form-item :label="field.notification.aliyun.sign.title">
            <el-input
              v-model="field.notification.aliyun.sign.value"
              :placeholder="field.notification.aliyun.sign.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.notification.aliyun.template.title">
            <el-input
              v-model="field.notification.aliyun.template.value"
              :placeholder="field.notification.aliyun.template.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.notification.aliyun.vars.title">
            <el-input
              v-model="field.notification.aliyun.vars.value"
              :placeholder="field.notification.aliyun.vars.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.notification.aliyun.test_mobile.title">
            <el-input
              v-model="field.notification.aliyun.test_mobile.value"
              :placeholder="field.notification.aliyun.test_mobile.desc"
            >
              <template slot="append">
                <a href>发送测试短信</a>
              </template>
            </el-input>
          </el-form-item>
        </el-col>
      </el-row>
    </el-card>
  </el-form>
</template>


<script>
import { mapState } from "vuex";

export default {
  name: "Base",
  computed: {
    ...mapState("site", { field: "config" })
  }
};
</script>

<style scoped>
</style>
