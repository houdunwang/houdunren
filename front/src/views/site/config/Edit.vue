<template>
  <div>
    <el-form ref="form" label-width="100px">
      <el-tabs v-model="activeName">
        <el-tab-pane label="邮箱配置" name="email">
          <email/>
        </el-tab-pane>
        <el-tab-pane label="阿里云" name="aliYun">
          <el-row>
            <el-col :span="16">
              <ali-yun/>
            </el-col>
          </el-row>
        </el-tab-pane>
        <el-tab-pane label="支付宝" name="aliPay">
          <el-row>
            <el-col :span="16">
              <ali-pay/>
            </el-col>
          </el-row>
        </el-tab-pane>
        <el-tab-pane label="上传配置" name="upload">
          <el-row>
            <el-col :span="16">
              <upload/>
            </el-col>
          </el-row>
        </el-tab-pane>

        <el-tab-pane label="用户相关" name="user">
          <el-row>
            <el-col :span="16">
              <user/>
            </el-col>
          </el-row>
        </el-tab-pane>

        <el-tab-pane label="通知设置" name="notification">
          <el-row>
            <el-col :span="16">
              <notification/>
            </el-col>
          </el-row>
        </el-tab-pane>

        <el-tab-pane label="临时维护" name="maintain">
          <el-row>
            <el-col :span="16">
              <maintain/>
            </el-col>
          </el-row>
        </el-tab-pane>

      </el-tabs>
      <el-form-item class="mt-3">
        <el-button type="primary" @click="submit">保存提交</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
  import AliPay from './components/AliPay'
  import AliYun from './components/AliYun'
  import Email from './components/Email'
  import Maintain from './components/Maintain'
  import Notification from './components/Notification'
  import Upload from "./components/Upload";
  import User from "./components/User";
  import store from '@/store/index'
  import {mapState} from 'vuex'

  export default {
    async beforeRouteEnter(to, from, next) {
      let response = await window.axios.get(`/site/config/${to.params.id}`);
      await store.commit('site/config', response.data.data);
      next();
    },
    data() {
      return {
        activeName: 'email'
      }
    },
    components: {
      Email, AliPay, AliYun, Maintain, Notification, Upload, User
    },
    computed: {
      ...mapState('site', ['config'])
    },
    methods: {
      async submit() {
        await window.axios.put(`/site/config/${this.$route.params.id}`, {
          data: this.config
        });
        this.$message.success('更新成功');
        this.$router.push('/admin')
      }
    }
  }
</script>
<style>

</style>
