<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">绑定邮箱</div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item label="邮箱" prop="email" :rules="[{ required: true, message: '请输入邮箱', trigger: 'blur' }]">
            <el-input type="email" v-model="form.email"></el-input>
          </el-form-item>
          <send-code type="email" :account="form.email" :code.sync="form.code" />
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
