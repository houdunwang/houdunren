<template>
  <div>
    <nav>
      <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
        <router-link class="nav-link" :to="{ name: 'site' }">
          <i class="fa fa-home" aria-hidden="true"></i
        ></router-link>
        <a
          class="nav-item nav-link active"
          id="nav-home-tab"
          data-toggle="tab"
          href="#email"
          role="tab"
          aria-controls="email"
          aria-selected="true"
          >邮箱配置</a
        >
        <a
          class="nav-item nav-link"
          id="nav-profile-tab"
          data-toggle="tab"
          href="#aliyun"
          role="tab"
          aria-controls="aliyun"
          aria-selected="false"
          >阿里云</a
        >
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#alipay"
          role="tab"
          aria-controls="alipay"
          aria-selected="false"
          >支付宝</a
        >
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#upload"
          role="tab"
          aria-controls="upload"
          aria-selected="false"
          >上传配置</a
        >
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#user"
          role="tab"
          aria-controls="user"
          aria-selected="false"
          >用户相关</a
        >
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#notification"
          role="tab"
          aria-controls="notification"
          aria-selected="false"
        >
          通知设置
        </a>
        <a
          class="nav-item nav-link"
          id="nav-contact-tab"
          data-toggle="tab"
          href="#maintain"
          role="tab"
          aria-controls="maintain"
          aria-selected="false"
        >
          临时维护
        </a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="nav-home-tab"><email /></div>
      <div class="tab-pane fade" id="aliyun" role="tabpanel" aria-labelledby="nav-profile-tab"><ali-yun /></div>
      <div class="tab-pane fade" id="alipay" role="tabpanel" aria-labelledby="nav-contact-tab"><ali-pay /></div>
      <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="nav-contact-tab"><upload /></div>
      <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="nav-contact-tab"><user /></div>
      <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="nav-contact-tab">
        <notification />
      </div>
      <div class="tab-pane fade" id="maintain" role="tabpanel" aria-labelledby="nav-contact-tab">
        <maintain />
      </div>
    </div>

    <el-button type="primary" class="mt-3" @click="submit">保存提交</el-button>
  </div>
</template>
<script>
import AliPay from './layouts/AliPay'
import AliYun from './layouts/AliYun'
import Email from './layouts/Email'
import Maintain from './layouts/Maintain'
import Notification from './layouts/Notification'
import Upload from './layouts/Upload'
import User from './layouts/User'
import store from '@/store/index'
import { mapState } from 'vuex'

export default {
  async beforeRouteEnter(to, from, next) {
    let response = await window.axios.get(`/site/config/${to.params.sid}`)
    await store.commit('siteConfig/set', response.data.data)
    next()
  },
  data() {
    return {
      activeName: 'email'
    }
  },
  components: {
    Email,
    AliPay,
    AliYun,
    Maintain,
    Notification,
    Upload,
    User
  },
  computed: {
    ...mapState('siteConfig', ['config'])
  },
  methods: {
    async submit() {
      await window.axios.put(`site/config/${this.$route.params.sid}`, {
        data: this.config
      })
      this.$message.success('更新成功')
    }
  }
}
</script>
<style></style>
