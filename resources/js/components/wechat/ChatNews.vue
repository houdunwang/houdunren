<template>
  <div>
    <div class="d-flex mt-3">
      <div class="border">
        <div class="view">
          <draggable v-model="news" group="people" @start="drag = true" @end="drag = false" class="wechat-news">
            <div v-for="(article, index) in news" :key="index" @click="current = article" :class="{ active: current == article }">
              <img :src="article.picurl || (index == 0 ? '/images/nopic480x310.jpg' : '/images/nopic160x160.jpg')" />
              <h2>{{ article.title || '图文消息标题' }}</h2>
            </div>
          </draggable>
        </div>
        <div class="p-3 text-center" v-if="news.length < 5">
          <button class="btn btn-outline-primary mt-3" type="button" @click.prevent="add">添加图文消息</button>
        </div>
      </div>
      <div class="border ml-3 flex-fill p-3 d-flex flex-column" v-if="current">
        <div class="flex-fill">
          <div class="form-group">
            <label>标题</label>
            <input type="text" class="form-control" v-model="current.title" />
          </div>
          <image-upload :value.sync="current.picurl"></image-upload>

          <div class="form-group">
            <label>链接</label>
            <input type="text" class="form-control" v-model="current.url" />
          </div>
        </div>

        <div>
          <button class="btn btn-outline-danger mt-3" type="button" @click.prevent="del">删除图文消息</button>
        </div>
      </div>
      <textarea name="contents" v-html="news" hidden></textarea>
    </div>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
const field = {
  title: '',
  description: '',
  picurl: '',
  url: 'https://',
}
export default {
  components: {
    draggable,
  },
  props: {
    id: { type: Number, default: null },
  },
  data() {
    return {
      news: [Object.assign({}, field)],
      current: null,
    }
  },
  mounted() {
    this.initCurrent()
    this.getArticle()
  },
  methods: {
    async getArticle() {
      if (this.id) {
        const response = await this.axios.get(`wechat/news/${this.id}`)
        this.news = response.contents
        this.initCurrent()
      }
    },
    initCurrent() {
      if (this.news.length) {
        this.current = this.news[0]
      } else {
        this.current = {}
      }
    },
    add() {
      this.news.push(Object.assign({}, field))
      this.current = this.news[this.news.length - 1]
    },
    del() {
      if (this.news.length == 1) {
        this.$message.error('最少要有一个图文消息')
        return
      }
      this.$confirm('确定删除吗？', '温馨提示').then(() => {
        this.news.map((v, i) => {
          if (v === this.current) {
            this.news.splice(i, 1)
            this.initCurrent()
          }
        })
      })
    },
  },
}
</script>

<style lang="scss">
.view {
  width: 350px;
}
</style>
