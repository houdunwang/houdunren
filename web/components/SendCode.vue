<template>
  <div>
    <el-form-item label="验证码">
      <el-input placeholder="请输入验证码" v-model="codeNum">
        <template slot="append">
          <a href="#" @click.prevent="send" class="disabled">{{ message }}</a>
        </template>
      </el-input>
    </el-form-item>
  </div>
</template>

<script>
import store from 'store2'
import moment from 'moment'
export default {
  props: ['type', 'account', 'code'],
  data() {
    return {
      //上次发送的时间间隔
      sendtime: 0,
      //每次发送的时间间隔
      timeout: 120,
      title: this.type === 'sms' ? '手机号' : '邮箱'
    }
  },
  created() {
    setInterval(() => {
      let preSend = store.get('sendtime') || 0
      this.sendtime = moment().diff(preSend, 'second')
    }, 1000)
  },
  computed: {
    //按钮文本
    message() {
      return this.sendtime > this.timeout ? '发送验证码' : this.timeout - this.sendtime + ' 秒后发送'
    },
    codeNum: {
      get() {
        return this.code
      },
      set(value) {
        this.$emit('update:code', value)
      }
    }
  },
  methods: {
    //发送验证码
    async send() {
      if (this.check() === true) {
        await this.axios.post(`common/code`, { type: this.type, account: this.account })

        this.$message.success('验证码发送成功，请在30分钟内使用')
        store.set('sendtime', moment())
      }
    },
    //业务验证
    check() {
      if (Boolean(this.account) === false) {
        this.$message.error(this.title + '不能为空')
        return false
      }
      return this.sendtime > this.timeout
    }
  }
}
</script>

<style></style>
