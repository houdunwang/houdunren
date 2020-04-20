<template>
  <a-card title="绑定手机" size="small">
    <a-form-model :model="user" ref="user" :label-col="{span:3}" :wrapper-col="{span:10}">
      <a-form-model-item label="手机号">
        <a-input v-model="user.mobile"></a-input>
      </a-form-model-item>
      <a-form-model-item label="验证码">
        <send-code :state="user.mobile!=''" :account.sync="user.mobile" :code.sync="code" />
      </a-form-model-item>
      <a-form-model-item :wrapper-col="{ span: 14, offset: 3 }">
        <a-button type="primary" @click="onSubmit">保存提交</a-button>
      </a-form-model-item>
    </a-form-model>
  </a-card>
</template>
<script>
import _ from 'lodash'
import SendCode from '@/components/SendCode'
import { mapState } from 'vuex'
export default {
  components: { SendCode },
  data() {
    return {
      code: ''
    }
  },
  //   async created() {
  //     let response = await this.axios.get(`member/get`)
  //     this.$set(this, 'form', response.data)
  //   },
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {
    onSubmit() {
      this.$refs['user'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/mobile`, { ...this.user, code: this.code })
          this.$message.success('手机号修改成功')
        }
      })
    }
  }
}
</script>

<style></style>
