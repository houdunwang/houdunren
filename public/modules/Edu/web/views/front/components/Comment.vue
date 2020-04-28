<template>
  <div>
    <div class="card shadow-sm mb-2" v-for="(comment, index) in comments" :key="index">
      <div class="card-header bg-white d-flex justify-content-start">
        <img
          :src="comment.user.avatar || `/images/avatar.jpg`"
          class="avatar rounded img-thumbnail mr-3"
        />
        <div class="flex-fill">
          <div class="text-secondary">{{ comment.user.name }}</div>
          <span class="small text-black-50">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            {{ comment.created_at | dateFormat }}
          </span>
        </div>
      </div>
      <div class="card-body text-secondary pb-5">
        <a href="#" class v-if="comment.reply">@{{ comment.reply.name }}</a>
        <p v-html="comment.content" class="d-inline-block"></p>
      </div>
      <div class="card-footer text-muted bg-white small">
        # {{ index + 1 }}
        <a
          href="#"
          class="ml-2 mr-2"
          v-if="comment.id"
          @click.prevent="favour(comment)"
        >{{ comment.favour_count ? comment.favour_count : 0 }}个赞</a>

        <a
          href="#"
          class="d-inline-block mr-1"
          v-scroll-to="'.reply-editor'"
          v-if="comment.id"
          @click.prevent="reply(comment)"
        >
          <i class="fa fa-reply" aria-hidden="true"></i> 回复
        </a>
      </div>
    </div>
    <div class="mt-2 bg-white shadow-sm border p-5 d-flex justify-content-center" v-if="!isLogin">
      <a :href="`/login?redirect=${$route.fullPath}`" class="btn btn-success">登录后发表评论</a>
    </div>
    <div class="card mt-2 border-0 bg-white shadow-sm reply-editor" v-if="isLogin">
      <div class="p-3 bg-white border small text-secondary border-bottom-0" v-if="replyComment">
        回复:
        <span class="text-success">{{ replyComment.user.name }}</span>
        <a href="#" @click.prevent="replyComment = null">
          <i class="fa fa-window-close" aria-hidden="true"></i>
        </a>
      </div>
      <editor
        height="300px"
        initialEditType="wysiwyg"
        ref="editor"
        :initialValue="form.content"
        :field.sync="form.content"
      />
      <div class="card-footer text-muted border-top-0 border-left border-right border-bottom">
        <button class="btn btn-success btn-sm mr-2" @click="submit">发表评论</button>
        <span class="small text-secondary">评论发布时间间隔 20 秒</span>
      </div>
    </div>
  </div>
</template>

<script>
import Editor from '@/components/Editor'
import { mapState, mapGetters } from 'vuex'
export default {
  components: { Editor },
  props: {
    action: String,
    comments: Array
  },
  data() {
    return {
      form: {
        reply_user_id: 0,
        content: ''
      },
      replyComment: null
    }
  },
  computed: {
    ...mapState('user', ['user']),
    ...mapGetters('user', ['isLogin'])
  },
  methods: {
    async submit() {
      let response = await this.axios.post(this.action, this.form)
      this.$refs.editor.editor.setMarkdown('')
      this.form.reply_user_id = 0
      this.replyComment = null
      this.comments.push(response.data)
      this.$message.success('评论发表成功')
    },
    //编辑器子组件内容更改通知事件
    editorChangeContent(content) {
      this.form.content = content
    },
    reply(comment) {
      this.replyComment = comment
      this.form.reply_user_id = comment.user.id
    },
    async favour(comment) {
      const response = await this.axios.get(`edu/front/comment/favour/${comment.id}`).then(r => r.data)
      comment.favour_count = response.favour_count
    }
  }
}
</script>

<style lang="scss" scoped>
.card-header {
  height: auto;
  .avatar {
    height: 45px;
    width: 45px;
  }
}
</style>
