<template>
  <div>
    <nav class="nav nav-tabs nav-stacked">
      <router-link class="nav-link" :to="{name:'system'}">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">我的资料</a>
    </nav>
    <a-form-model
      :model="form"
      ref="form"
      :rules="rules"
      :label-col="{span:3}"
      :wrapper-col="{span:10}"
    >
      <div class="card mt-2">
        <div class="card-header bg-white">我的资料</div>
        <div class="card-body">
          <a-form-model-item label="昵称" prop="name">
            <a-input v-model="form.name"></a-input>
          </a-form-model-item>
          <a-form-model-item label="邮箱">
            <a-input v-model="form.email"></a-input>
          </a-form-model-item>
          <a-form-model-item label="手机号">
            <a-input v-model="form.mobile"></a-input>
          </a-form-model-item>
          <a-form-model-item label="真实姓名">
            <a-input v-model="form.real_name"></a-input>
          </a-form-model-item>
          <a-form-model-item :wrapper-col="{ span: 14, offset: 3}">
            <a-button type="primary" @click="onSubmit">保存提交</a-button>
          </a-form-model-item>
        </div>
      </div>
    </a-form-model>
    <a-form-model
      ref="passwordForm"
      :model="form"
      :rules="rules"
      :label-col="{span:3}"
      :wrapper-col="{span:10}"
    >
      <div class="card mt-2">
        <div class="card-header bg-white">修改密码</div>
        <div class="card-body">
          <a-form-model-item label="密码" prop="password">
            <a-input type="password" v-model="form.password"></a-input>
          </a-form-model-item>
          <a-form-model-item label="确认密码" prop="password_confirmation">
            <a-input type="password" v-model="form.password_confirmation"></a-input>
          </a-form-model-item>
          <a-form-model-item :wrapper-col="{ span: 14, offset: 3}">
            <a-button type="primary" @click="onUpdatePassword">保存提交</a-button>
          </a-form-model-item>
        </div>
      </div>
    </a-form-model>
  </div>
</template>

<script>
import _ from 'lodash'
import { mapState } from 'vuex'
const rules = {
  name: [{ required: true, message: '昵称不能为空' }],
  password: [{ required: true, message: '密码不能为空' }],
  password_confirmation: [{ required: true, message: '确认密码能为空' }]
}
export default {
  data() {
    return {
      rules
    }
  },
  computed: {
    ...mapState('user', { form: 'data' })
  },
  methods: {
    async onSubmit() {
      let form = _.pickBy(this.form, (v, k) => k != 'password')
      await this.axios.put(`system/user/${this.form.id}`, this.form)
      this.$message.success('保存成功')
    },
    onUpdatePassword() {
      this.$refs.passwordForm.validate(async valid => {
        if (valid) {
          await this.axios.put(`system/user/${this.form.id}`, this.form)
          this.$message.success('密码修改成功')
        }
      })
    },
    //上传标志
    uploadAvatar(response) {
      if (response.file.status === 'done') {
        this.form.avatar = response.file.response.path
      }
    }
  }
}
</script>

<style>
</style>
