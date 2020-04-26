<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12 col-md-9" v-if="!topic">
        <div class="bg-white rounded shadow-sm border border-gary shadow-sm  p-md-5 p-3">
          <a-skeleton :avatar="false" active :paragraph="{ rows: 20 }" />
        </div>
      </div>
      <div class="col-12 col-md-9" v-if="topic">
        <div class="bg-white rounded shadow-sm border border-gary shadow-sm  p-md-5 p-3">
          <div class="border-bottom mb-5 pb-3">
            <h4 class="pb-1 pt-3 mb-3 text-monospace text-black-50">{{ topic.title }}</h4>
            <div class="small text-secondary clearfix">
              <div class="float-left pt-2">
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
                  <a href="https://www.houdunren.com/edu/front/topic-recommend/1759" class="btn btn-outline-secondary"
                    >推荐</a
                  >
                  <router-link
                    :to="{ name: 'topic.edit', params: { id: topic.id } }"
                    v-if="topic.user.id === user.id"
                    class="btn btn-outline-success"
                    >编辑</router-link
                  >
                  <a
                    href="#"
                    v-if="topic.user.id === user.id"
                    class="btn btn-outline-danger"
                    @click.prevent="del(topic)"
                  >
                    删除
                  </a>
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                  <button
                    onclick="modelFavorite()"
                    class="btn btn-outline-danger btn-sm float-right small p-0 pl-2 pr-2 favorite d-none"
                  >
                    <i class="fa fa-heart"></i> 已收藏
                  </button>
                  <button
                    onclick="modelFavorite()"
                    class="btn btn-outline-secondary rounded-left btn-sm float-right small p-0 pl-2 pr-2 favorite"
                  >
                    <i class="fa fa-heart-o"></i> 收藏
                  </button>
                  <button type="button" class="btn btn-outline-secondary favoriteCount">0</button>
                </div>
              </div>
            </div>
          </div>
          <div class="text-black-50 topic-content markdown bg-white" v-html="topic.content" v-highlight></div>
          <div class="mt-5 text-center border-top border-gary pt-5">
            <div class="favour btn-group mr-2 d-none" role="group" aria-label="First group">
              <button class="btn btn-success" onclick="modelFavour()"><i class="fa fa-thumbs-o-up"></i> 已赞</button>
              <button type="button" onclick="modelFavour()" class="btn btn-outline-secondary border-left-0 favourCount">
                0
              </button>
            </div>
            <div class="favour btn-group mr-2" role="group" aria-label="First group">
              <button class="btn btn-outline-secondary" onclick="modelFavour()">
                <i class="fa fa-thumbs-o-up"></i> 点个赞呗
              </button>
              <button type="button" onclick="modelFavour()" class="btn btn-outline-secondary border-left-0 favourCount">
                0
              </button>
            </div>
          </div>
          <div class="favour-list text-center pt-3 w-75 m-auto">
            <a href="https://www.houdunren.com/user/1" class="d-none favour-current-1">
              <img
                src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/11552521685.png"
                class="rounded-circle avatar"
                alt="向军大叔"
                style="width: 50px;height:50px;"
              />
            </a>
          </div>
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
import { mapState } from 'vuex'
export default {
  components: { Tips, User },
  data() {
    return {
      topic: null
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
    async load() {
      let response = await this.axios.get(`edu/front/topic/${this.$route.params.id}`)
      this.$set(this, 'topic', response.data)
    },
    async del(topic) {
      let response = await this.axios.delete(`edu/front/topic/${topic.id}`)
      this.$message.success('删除成功')
      this.$router.push({ name: 'topic.index' })
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
