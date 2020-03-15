<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">
        修改手机号
      </div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item
            label="手机号"
            prop="phone"
            :rules="[{ required: true, message: '请输入手机号', trigger: 'blur' }]"
          >
            <el-input type="phone" v-model="form.phone"></el-input>
          </el-form-item>
          <PhoneValidate />
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
import PhoneValidate from '@/components/PhoneValidate'
export default {
  components: { PhoneValidate },
  data() {
    return {
      form: {}
    }
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/password`, this.form)
          this.$message.success('密码修改成功')
        }
      })
    }
  }
}
</script>

<style></style>
