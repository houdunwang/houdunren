<template>
  <div v-if="form.user">
    <a-tabs defaultActiveKey="7" type="card">
      <a-tab-pane key="1" tab="用户相关">
        <user :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="2" tab="阿里云">
        <ali-yun :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="3" tab="支付宝">
        <ali-pay :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="4" tab="微信支付">
        <we-pay :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="5" tab="上传配置">
        <upload :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="6" tab="邮箱配置">
        <email :form.sync="form" />
      </a-tab-pane>
      <a-tab-pane key="7" tab="短信设置">
        <sms :form.sync="form" />
      </a-tab-pane>
    </a-tabs>

    <a-form-item :wrapper-col="{ span: 1, offset: 3 }" class="mt-3">
      <a-button type="primary" @click="submit">保存提交</a-button>
    </a-form-item>
  </div>
</template>
<script>
import AliPay from './layouts/AliPay'
import AliYun from './layouts/AliYun'
import WePay from './layouts/WePay'
import Email from './layouts/Email'
import Sms from './layouts/Sms'
import Upload from './layouts/Upload'
import User from './layouts/User'
import store from '@/store/index'
import { mapState } from 'vuex'

export default {
  components: {
    Email,
    AliPay,
    WePay,
    AliYun,
    Sms,
    Upload,
    User
  },
  data() {
    return {
      form: {},
      activeName: 'user'
    }
  },
  async created() {
    let response = await this.axios.get(`site/config/${this.$route.params.sid}`)
    this.$set(this, 'form', response.data)
  },
  methods: {
    async submit() {
      await window.axios.put(`site/config/${this.$route.params.sid}`, this.form)
      this.$message.success('配置更新成功')
    }
  }
}
</script>
<style></style>
