<template>
  <div>
    <div class="card shadow-sm mb-2" v-for="(comment, index) in comments" :key="index">
      <div class="card-header bg-white d-flex justify-content-start ">
        <img src="http://localhost:3002/images/member-login.jpg" class="avatar rounded img-thumbnail mr-3" />
        <div class="flex-fill">
          <div class="text-secondary">{{ comment.user.nickname }}</div>
          <span class="small text-black-50">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            {{ comment.pivot.created_at | dateFormat }}
          </span>
        </div>
      </div>
      <div class="card-body text-secondary pb-5" v-html="comment.pivot.content"></div>
      <div class="card-footer text-muted bg-white small">
        # {{ index }}
        <div class="d-inline-block ml-2 mr-2" v-if="comment.id">0个赞</div>
        <a href="#" class="d-inline-block mr-1" v-if="comment.id"
          ><i class="fa fa-reply" aria-hidden="true"></i> 回复</a
        >
      </div>
    </div>
    <div class="card mt-2 border-0 bg-white shadow-sm">
      <editor
        height="300px"
        initialEditType="wysiwyg"
        ref="editor"
        :initialValue="form.content"
        @contentChange="editorChangeContent"
      />
      <div class="card-footer text-muted border-top-0 border-left border-right border-bottom">
        <button class="btn btn-success btn-sm mr-2" @click="submit">发表评论</button>
        <span class="small text-secondary">评论发布时间间隔 20 秒</span>
      </div>
    </div>
  </div>
</template>

<script>
import Editor from './Editor'
// import moment from 'moment'
import { mapState } from 'vuex'
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
      }
    }
  },
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {
    async submit() {
      let response = await this.axios.post(this.action, this.form)
      this.$refs.editor.editor.setMarkdown('')
      this.comments.push({
        user: this.user,
        pivot: {
          content: this.form.content,
          created_at: moment()
        }
      })
      this.$message.success('评论发表成功')
    },
    //编辑器子组件内容更改通知事件
    editorChangeContent(content) {
      this.form.content = content
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
