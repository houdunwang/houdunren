<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12 col-md-9" v-if="!topic">
        <div class="bg-white rounded shadow-sm border border-gary shadow-sm p-md-5 p-3">
          <a-skeleton :avatar="false" active :paragraph="{ rows: 20 }" />
        </div>
      </div>
      <div class="col-12 col-md-9" v-if="topic">
        <div class="bg-white rounded shadow-sm border border-gary shadow-sm p-md-5 p-3">
          <div class="border-bottom mb-5 pb-3">
            <h4 class="pb-1 pt-3 mb-3 text-monospace text-black-50">{{ topic.title }}</h4>
            <div class="small text-secondary clearfix">
              <div class="float-left pt-2">
                <router-link :to="`/edu/center/topic/${topic.user.id}`" class="text-success">{{
                  topic.user.name
                }}</router-link>
                创建于{{ topic.created_at | dateFormat }}
                <span class="pr-2 pl-2">/</span>
                评论数{{ topic.comment_count }}
                <span class="pr-2 pl-2">/</span>
                更新于{{ topic.updated_at | dateFormat }}
                <span class="pr-2 pl-2">/</span>
                收藏数{{ topic.favorite_count }}
                <span class="pr-2 pl-2">/</span>
                点赞数{{ topic.favour_count }}
              </div>
              <div class="float-right">
                <div class="btn-group btn-group-sm">
                  <button
                    href="#"
                    class="btn btn-outline-secondary"
                    :class="{ 'btn-outline-info': topic.recommend }"
                    v-if="access.isAdmin()"
                    @click.prevent="commend"
                  >
                    推荐
                  </button>
                  <router-link
                    :to="{ name: 'topic.edit', params: { id: topic.id } }"
                    v-if="topic.user.id === user.id || access.isAdmin()"
                    class="btn btn-outline-success"
                    >编辑</router-link
                  >
                  <a
                    href="#"
                    v-if="topic.user.id === user.id || access.isAdmin()"
                    class="btn btn-outline-danger"
                    @click.prevent="del(topic)"
                    >删除</a
                  >
                </div>
                <div class="btn-group btn-group-sm align-items-center mt-1 mt-md-0">
                  <button
                    class="btn btn-outline-secondary"
                    :class="{ 'btn-outline-info': topic.is_favorite }"
                    type="button"
                    aria-label
                    @click.prevent="favorite"
                  >
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏
                  </button>
                  <button
                    class="btn btn-outline-secondary"
                    :class="{ 'btn-outline-info': topic.is_favorite }"
                    type="button"
                    aria-label
                  >
                    {{ topic.favorite_count }}
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="text-black-50 topic-content markdown bg-white" v-html="content('.topic-content')"></div>
          <preview-image el=".topic-content" />
          <div class="mt-5 text-center border-top border-gary pt-5">
            <div class="favour btn-group mr-2" role="group" aria-label="First group">
              <button
                class="btn"
                :class="{ 'btn-success': topic.is_favour, 'btn-outline-secondary': !topic.is_favour }"
                @click.prevent="favour"
              >
                <i class="fa fa-thumbs-o-up"></i> 点个赞呗
              </button>
              <button
                type="button"
                @click.prevent="favour"
                class="btn"
                :class="{ 'btn-success': topic.is_favour, 'btn-outline-secondary': !topic.is_favour }"
              >
                {{ topic.favour_count }}
              </button>
            </div>
          </div>
          <div class="favour-list text-center pt-3 w-75 m-auto">
            <router-link
              :to="`/edu/center/topic/${user.id}`"
              v-for="user in topic.favour_users"
              :key="user.id"
              class="m-1"
            >
              <a-avatar :src="user.avatar" size="large"></a-avatar>
            </router-link>
          </div>
        </div>
        <div class="mt-3">
          <comment
            v-if="comments"
            height="300px"
            :action="`edu/front/topic/comment/${topic.id}`"
            :comments="comments"
          />
        </div>
      </div>
      <div class="col-12 col-md-3 p-0">
        <user class="mb-2" :id="topic.user.id" v-if="topic" />
        <tips />
      </div>
    </div>
  </div>
</template>

<script>
import User from '@/components/User'
import Tips from '../components/Tips'
import access from '@/services/access'
import Comment from '../components/Comment'
import { mapState } from 'vuex'
import Editor from '@toast-ui/editor'
import PreviewImage from '@/components/PreviewImage'
export default {
  components: { Tips, User, Comment, PreviewImage },
  data() {
    return {
      topic: null,
      access,
      comments: null
    }
  },
  computed: {
    ...mapState('user', ['user'])
  },
  async created() {
    this.load()
  },
  directives: {
    highlight: {
      inserted: el => {
        let blocks = el.querySelectorAll('pre code')
        blocks.forEach(block => {
          hljs.highlightBlock(block)
        })
      }
    }
  },
  methods: {
    //预览MARKDOWN内容
    content(el) {
      setTimeout(() => {
        const viewer = new Editor.factory({
          el: document.querySelector(el),
          viewer: true,
          initialValue: this.topic.content
        })
        // document.querySelector('.tui-editor-contents').classList.remove('tui-editor-contents')
      })
    },
    load() {
      let id = this.$route.params.id
      this.axios.get(`edu/front/topic/${id}`).then(response => {
        this.$set(this, 'topic', response.data)
      })
      this.axios.get(`edu/front/topic/comment/${id}`).then(response => {
        this.$set(this, 'comments', response.data)
      })
    },
    async del(topic) {
      this.$confirm({
        content: '确定删除吗？',
        onOk: async () => {
          let response = await this.axios.delete(`edu/front/topic/${topic.id}`)
          this.$message.success('删除成功')
          this.$router.push({ name: 'topic.index' })
        }
      })
    },
    async favour() {
      let response = await this.axios.get(`edu/front/topic/favour/${this.topic.id}`)
      this.$set(this, 'topic', response.data)
    },
    async favorite() {
      let response = await this.axios.get(`edu/front/topic/favorite/${this.topic.id}`)
      this.$set(this, 'topic', response.data)
    },
    async commend() {
      let response = await this.axios.get(`edu/front/topic/commend/${this.topic.id}`)
      this.$set(this, 'topic', response.data)
    }
  }
}
</script>
<style lang="scss">
.topic-content {
  img {
    max-width: 95%;
  }
  @media screen and(min-width: 768px) {
    pre {
      margin-left: -3rem;
      margin-right: -3rem;
      code {
        padding: 1rem 3rem;
      }
    }
  }
}
</style>
