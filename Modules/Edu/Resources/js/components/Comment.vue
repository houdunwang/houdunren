<template>
  <div>
    <div
      :id="`comment-` + comment.id"
      class="card shadow-sm mb-2"
      v-for="(comment, index) in comments"
      :key="comment.id"
    >
      <div class="card-header bg-white d-flex justify-content-start">
        <img :src="comment.user.avatar" class="rounded mr-3 w35 h35" />
        <div class="flex-fill">
          <div class="text-secondary">
            <a :href="`/edu/space/${comment.user.id}/topic`" class>{{ comment.user.name }}</a>
          </div>
          <span class="small text-black-50">
            <i aria-hidden="true" class="fa fa-clock-o"></i>
            {{ comment.created_at }}
          </span>
        </div>
      </div>
      <div class="card-body text-secondary pb-5 markdown">
        <div class="d-inline-block" v-html="comment.content"></div>
      </div>
      <div class="card-footer text-muted bg-white small">
        # {{ index + 1 }}
        <!--        <a href="#" class="ml-2 mr-2">0个赞</a>-->
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
          <span v-if="reply_user.name">
            回复：{{ reply_user.name }}
            <a href="#" @click.prevent="reply_user = {}">
              <i class="fa fa-window-close"></i>
            </a>
          </span>
          <span v-if="!reply_user.name">发表评论</span>
        </div>
        <editor name="content" action :content.sync="content" :key="sendId"></editor>
        <div class="card-footer text-muted">
          <button type="button" class="btn btn-primary btn-sm" @click="submit">保存</button>
        </div>
      </div>

      <div class="card">
        <div class="card-body text-center pt-5 pb-5">
          <a href="/login" class="btn btn-info btn-sm">登录后发表评论</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Editor from './Editor.vue'
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
        this.$nextTick(()=>{
            if(location.hash){this.$scrollTo(location.hash)}
        })
    },
    async submit() {
      if (this.content == '') {
        return this.$message.error('评论内容不能为')
      }
      let { data: comment } = await this.axios.post(this.action, { content: this.content })
      this.comments.push(comment)
      this.content = ''
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

<style></style>
