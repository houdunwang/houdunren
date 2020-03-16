<template>
  <div>
    <nav>
      <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
        <router-link class="nav-link" :to="{ name: 'site' }">
          <i class="fa fa-home" aria-hidden="true"></i>
        </router-link>
        <a
          class="nav-item nav-link active"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#user"
          role="tab"
          aria-controls="user"
          aria-selected="false"
        >用户相关</a>

        <a
          class="nav-item nav-link"
          id="nav-profile-tab"
          data-toggle="tab"
          href="#aliyun"
          role="tab"
          aria-controls="aliyun"
          aria-selected="false"
        >阿里云</a>
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#alipay"
          role="tab"
          aria-controls="alipay"
          aria-selected="false"
        >支付宝</a>
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#wepay"
          role="tab"
          aria-controls="wepay"
          aria-selected="false"
        >微信支付</a>
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#upload"
          role="tab"
          aria-controls="upload"
          aria-selected="false"
        >上传配置</a>
        <a
          class="nav-item nav-link"
          id="nav-home-tab"
          data-toggle="tab"
          href="#email"
          role="tab"
          aria-controls="email"
          aria-selected="true"
        >邮箱配置</a>
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#sms"
          role="tab"
          aria-controls="sms"
          aria-selected="false"
        >短信设置</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent" v-if="form.user">
      <div
        class="tab-pane fade show active"
        id="user"
        role="tabpanel"
        aria-labelledby="nav-contact-tab"
      >
        <user :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade" id="aliyun" role="tabpanel" aria-labelledby="nav-profile-tab">
        <ali-yun :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade" id="alipay" role="tabpanel" aria-labelledby="nav-profile-tab">
        <ali-pay :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade" id="wepay" role="tabpanel" aria-labelledby="nav-contact-tab">
        <we-pay :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="nav-contact-tab">
        <upload :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade show" id="email" role="tabpanel" aria-labelledby="nav-home-tab">
        <email :form.sync="form" @submit="submit" />
      </div>
      <div class="tab-pane fade" id="sms" role="tabpanel" aria-labelledby="nav-contact-tab">
        <sms :form.sync="form" @submit="submit" />
      </div>
    </div>

    <el-button type="primary" class="mt-3" @click="submit">保存提交</el-button>
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
      this.$message.success('更新成功')
    }
  }
}
</script>
<style></style>
