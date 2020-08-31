<template>
  <div class="comment">
    <div
      :id="`comment-` + comment.id"
      class="card shadow-sm mb-2"
      v-for="(comment, index) in comments"
      :key="index"
    >
      <div class="card-header bg-white d-flex justify-content-start">
        <img :src="comment.user.icon" class="rounded mr-3 w35 h35" />
        <div class="flex-fill">
          <div class="text-secondary">
            <a :href="`/edu/space/${comment.user.id}/topic`">{{ comment.user.nickname }}</a>
          </div>
          <span class="small text-black-50">
            <i aria-hidden="true" class="fa fa-clock-o"></i>
            {{ comment.created_at }}
          </span>
        </div>
      </div>

      <div class="card-body text-secondary pb-5">
        <a
          :href="`/edu/space/${comment.reply_user.id}/topic`"
          class="text-blue d-block mb-3"
          v-if="comment.reply_user.id"
        >@{{comment.reply_user.nickname}}</a>

        <div v-highlight class="markdown" v-html="comment.html"></div>
      </div>

      <div class="card-footer text-muted bg-white small">
        # {{ index + 1 }}
        <a
          href="#"
          class="d-inline-block mr-2 ml-2"
          @click.prevent="reply_user = comment.user"
          v-scroll-to="'#commentForm'"
        >
          <i aria-hidden="true" class="fa fa-reply"></i> 回复
        </a>
        <a
          href="#"
          class="d-inline-block"
          v-if="user['admin'] || comment['user_id'] === user.id"
          @click.prevent="del(comment)"
        >
          <i class="fas fa-times-circle"></i>
          删除
        </a>
      </div>
    </div>
    <div id="commentForm">
      <div class="card" v-if="user.id">
        <div class="card-header">
          <span v-if="reply_user.id">
            回复：
            <span class="text-primary">{{ reply_user.nickname }}</span>
            <a href="#" @click.prevent="reply_user = {}">
              <i class="fa fa-window-close"></i>
            </a>
          </span>
          <span v-if="!reply_user.id">发表评论</span>
        </div>
        <editor name="content" action="/common/upload/image" :content.sync="content" :key="sendId"></editor>
        <div class="card-footer text-muted">
          <button type="button" class="btn btn-primary btn-sm d-inline-block" @click="submit">保存</button>
          <strong
            class="text-danger d-inline-block ml-3"
            v-if="errors.content"
            style="font-size: 13px;"
          >{{ errors.content }}</strong>
        </div>
      </div>

      <div class="card" v-if="!user.id">
        <div class="card-body text-center pt-5 pb-5">
          <a href="/auth/login" class="btn btn-info btn-sm">登录后发表评论</a>
        </div>
      </div>
    </div>

    <el-backtop></el-backtop>
  </div>
</template>


<script>
import Editor from '../../../../../resources/js/components/Editor.vue'
import { mapState } from 'vuex'
import ToastEditor from '@toast-ui/editor'
export default {
  components: { Editor },
  props: {
    model: { required: true, type: String },
    id: { required: true, type: Number },
  },
  data() {
    return {
      user: {},
      sendId: 0,
      content: '',
      comments: [],
      reply_user: {},
    }
  },
  computed: {
    ...mapState(['errors']),
    action() {
      return `/Edu/comment/${this.model}/${this.id}`
    },
  },
  mounted() {
    this.load()
  },
  methods: {
    async load() {
      const {
        data,
        meta: { user },
      } = await this.axios.get(this.action)
      this.comments = data
      this.user = user
      this.$nextTick(() => {
        if (location.hash) {
          this.$scrollTo(location.hash)
        }
      })
    },
    async submit() {
      if (this.content == '') {
        return this.$message.error('评论内容不能为')
      }
      if (this.content.trim().length < 10) {
        return this.$message.error('评论内容过少')
      }
      let { data: comment } = await this.axios.post(this.action, {
        content: this.content,
        reply_user_id: this.reply_user ? this.reply_user['id'] : 0,
      })
      this.comments.push(comment)
      this.content = ''
      this.reply_user = {}
      this.sendId++
    },
    del(comment) {
      this.$confirm('确定删除吗?', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning',
      }).then(() => {
        this.comments.splice(this.comments.indexOf(comment), 1)
        this.axios.delete(`/Edu/comment/${comment.id}`)
      })
    },
  },
}
</script>

<style lang="scss">
.comment {
  .text-blue {
    color: #0081f0;
  }
  .markdown {
    pre {
      left: -19px;
      padding: 1rem;
    }
  }
  img {
    max-width: 100%;
  }
}
</style>
