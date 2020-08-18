<template>
  <div class="flex-fill d-flex flex-column bg-light" style="height:380px">
    <div class="flex-fill p-2 chats">
      <div class="mb-2" v-for="(message,index) in messages" :key="index">
        <a href="#" class="text-secondary">{{ message.user.nickname }}</a>
        <div class="d-inline-block pt-1">{{ message.content }}</div>
      </div>
    </div>
    <div class>
      <div class="form-group mb-0" v-if="isLogin">
        <input
          type="text"
          class="form-control rounded-0 bg-light shadow-sm border-left-0 border-right-0"
          name="content"
          placeholder="说点什么吧..."
          v-model="content"
          @keyup.enter="send"
          style="outline: none !important; box-shadow: none;border:solid 3px #333;"
        />
      </div>
      <div class="form-group mb-0 text-center pt-2 pb-2 border-top border-bottom" v-if="!isLogin">
        <a href="/auth/login" class="btn btn-sm btn-info">请登录后操作</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      client_id: '',
      messages: [],
      content: '',
      isLogin: !!window.user.id,
    }
  },
  mounted() {
    let socket = new WebSocket('wss://dev.hdcms.com:8282')
    //绑定SOCKET会话处理
    socket.onmessage = this.message
  },
  methods: {
    message(response) {
      let data = JSON.parse(response.data)
      this.client_id = data.client_id
      switch (data.type) {
        //Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
        case 'init':
          this.axios.post('/Edu/chat/init', this.$data)
          break
        //聊天消息
        default:
          this.messages.push(data)
          this.messages = this.messages.reverse().splice(0, 20).reverse()
          this.$nextTick(() => {
            document.querySelector('.chats').scroll({ top: 9999 })
          })
          break
      }
    },
    send() {
      if (this.content.trim()) this.axios.post('/Edu/chat/send', this.$data).then((_) => (this.content = ''))
    },
  },
}
</script>

<style lang="scss" scoped>
.chats {
  overflow-y: auto;
  height: 200px;
}
</style>
