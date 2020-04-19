<template>
  <div>
    {{ state }}
    <a-input
      placeholder="请输入邮箱或手机号收到的验证码"
      v-model="codeText"
      @keyup="$emit('update:code',codeText)"
    >
      <span
        slot="addonAfter"
        @click="send"
        defaultValue="发送验证码"
        style="width: 80px;cursor:pointer"
      >{{message}}</span>
    </a-input>
  </div>
</template>

<script>
import store from 'store2'
import moment from 'moment'
export default {
  props: { code: { type: String }, account: { type: String }, state: { type: Boolean } },
  data() {
    return {
      diffTime: 5,
      message: '',
      codeText: ''
    }
  },
  created() {
    setInterval(() => {
      let sendtime = store.get('code-timeout', 0)
      let time = parseInt(this.diffTime - (moment.now() - sendtime) / 1000)
      let message = moment.now() - sendtime > this.diffTime * 1000 ? '发送验证码' : `请${time}秒后操作`
      this.$set(this, 'message', message)
    }, 1000)
  },
  methods: {
    //发送验证码
    send() {
      alert(this.state)
      return
      if (this.state) {
        let sendtime = store.get('code-timeout', 0)
        if ((moment.now() - sendtime) / 1000 > this.diffTime) {
          store.set('code-timeout', moment.now())
        }
      } else {
        this.$message.warning('请检查帐号后发送')
      }
    },
    async send() {
      if (!this.state) {
        return this.$message.warning('请检查帐号后发送')
      }
      if (this.account == '') {
        return this.$message.error('帐号不能为空')
      }
      let sendtime = store.get('code-timeout', 0)
      if ((moment.now() - sendtime) / 1000 > this.diffTime) {
        await this.axios.post(`common/code/send`, { account: this.account }).then(r => {
          store.set('code-timeout', moment.now())
          this.$message.success('验证码发送成功')
        })
      }
    }
  }
}
</script>
