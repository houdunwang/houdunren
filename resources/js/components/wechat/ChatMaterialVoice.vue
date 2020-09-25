<template>
  <div>
    <chat-list :id.sync="wechat_id"></chat-list>
    <div class="card" v-if="wechat_id">
      <div class="card-header">上传音频素材</div>
      <div class="card-body">
        <div class="form-group">
          <label>素材说明</label>
          <input type="text" class="form-control" v-model="content.title" />
        </div>
        <music-upload :value.sync="content.url"></music-upload>
        <div class="btn-group mt-3" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" @click.prevent="submit">保存提交</button>
          <a href="/wechat/material?type=voice" class="btn btn-outline-secondary">返回音频素材列表</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ChatList from './ChatList'
export default {
  components: {
    ChatList,
  },
  props: {
    id: { type: Number, default: 0 },
  },
  data() {
    return {
      wechat_id: 0,
      content: {
        url: '',
      },
    }
  },
  mounted() {
    if (this.id) {
      this.get(this.id)
    }
  },
  methods: {
    async get(id) {
      const response = await this.axios.get(`/wechat/material/${this.id}`)
      this.wechat_id = response.wechat_id
      this.content = response.content
    },
    async submit() {
      let msg = ''
      if (this.wechat_id == 0) {
        msg = '请选择微信公众号'
      }
      if (this.content.title.trim() == '') {
        msg = '素材说明不能为空'
      }
      if (this.content.url.trim() == '') {
        msg = '请选择音频文件'
      }
      if (msg) {
        return this.$message.error(msg)
      }
      if (this.id) {
        const response = await this.axios.put(`/wechat/material/${this.id}?type=voice`, this.$data)
      } else {
        const response = await this.axios.post(`/wechat/material?type=voice`, this.$data)
      }
      location.href = '/wechat/material?type=voice'
    },
  },
}
</script>

<style lang="scss"></style>
