<template>
  <div>
    <a-card title="我的资料" size="small">
      <a-form-model :model="user" ref="form" :label-col="{span:3}" :wrapper-col="{span:10}">
        <a-form-model-item label="昵称">
          <a-input v-model="user.name"></a-input>
        </a-form-model-item>
        <a-form-model-item label="真实姓名">
          <a-input v-model="user.real_name"></a-input>
        </a-form-model-item>
        <a-form-model-item label="个人网站">
          <a-input v-model="user.home"></a-input>
        </a-form-model-item>
        <a-form-model-item label="微博帐号">
          <a-input v-model="user.weibo"></a-input>
        </a-form-model-item>
        <a-form-model-item label="微信号">
          <a-input v-model="user.wechat"></a-input>
        </a-form-model-item>
        <a-form-model-item label="GitHub">
          <a-input v-model="user.github"></a-input>
        </a-form-model-item>
        <a-form-model-item label="QQ">
          <a-input v-model="user.qq"></a-input>
        </a-form-model-item>
        <a-form-model-item label="WakaTime">
          <a-input v-model="user.wakatime"></a-input>
        </a-form-model-item>
        <a-form-model-item label="昵称">
          <a-input v-model="user.name"></a-input>
        </a-form-model-item>
        <a-form-model-item :wrapper-col="{ span: 14, offset: 3 }">
          <a-button type="primary" @click="onSubmit">保存提交</a-button>
        </a-form-model-item>
      </a-form-model>
    </a-card>
  </div>
</template>

<script>
import _ from 'lodash'
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/user`, this.user)
          this.$message.success('修改成功')
        }
      })
    }
  }
}
</script>

<style></style>
