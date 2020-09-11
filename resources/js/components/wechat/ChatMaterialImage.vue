<template>
  <div>
    <chat-list :id.sync="wechat_id"></chat-list>
    <image-single-upload :value.sync="content.picurl"></image-single-upload>
    <div class="btn-group mt-3" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-primary" @click.prevent="submit">保存提交</button>
      <a href="/wechat/material/index?type=image" class="btn btn-outline-secondary">返回图片素材列表</a>
    </div>
  </div>
</template>

<script>
import ImageSingleUpload from '../../../../resources/js/components/ImageSingleUpload'
import ChatList from './ChatList'
export default {
  components: {
    ChatList,
  },
  data() {
    return {
      wechat_id: 0,
      content: {
        pic: '',
      },
    }
  },
  methods: {
    async submit() {
      let msg = ''
      if (this.wechat_id == 0) {
        msg = '请选择微信公众号'
      }
      if (this.content.pic.trim() == '') {
        msg = '请选择图片'
      }
      if (msg) {
        this.$message.error(msg)
      }
      const response = await this.axios.post(`/wechat/material`, this.$data)
    },
  },
}
</script>

<style lang="scss"></style>
