<template>
  <a-card title="绑定邮箱" size="small">
    <a-form-model :model="form" ref="form" :label-col="{span:3}" :wrapper-col="{span:10}">
      <a-form-model-item label="邮箱">
        <a-input v-model="form.email"></a-input>
      </a-form-model-item>
      <a-form-model-item label="验证码">
        <send-code :state="form.email!=''" :account.sync="form.email" :code.sync="form.code" />
      </a-form-model-item>
    </a-form-model>
    <a-form-model-item :wrapper-col="{ span: 14, offset: 3 }">
      <a-button type="primary" @click="onSubmit">保存提交</a-button>
    </a-form-model-item>
  </a-card>
</template>

<script>
import _ from 'lodash'
import SendCode from '@/components/SendCode'
export default {
  components: { SendCode },
  data() {
    return {
      form: {
        email: '',
        code: ''
      }
    }
  },
  async created() {
    let response = await this.axios.get(`member/get`)
    this.$set(this, 'form', response.data)
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/email`, this.form)
          this.$message.success('邮箱绑定成功')
        }
      })
    }
  }
}
</script>

<style></style>
