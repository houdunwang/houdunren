<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">绑定手机</div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item
            label="手机号"
            prop="phone"
            :rules="[{ required: true, message: '请输入手机号', trigger: 'blur' }]"
          >
            <el-input type="phone" v-model="form.phone"></el-input>
          </el-form-item>
          <send-code type="sms" :account="form.phone" :code.sync="form.code" />
          <el-form-item>
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
import _ from 'lodash'
import SendCode from '@/components/SendCode'
export default {
  components: { SendCode },
  data() {
    return {
      form: {
        phone: '',
        code: ''
      }
    }
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/phone`, this.form)
          this.$message.success('手机号修改成功')
        }
      })
    }
  }
}
</script>

<style></style>
