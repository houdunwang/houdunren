<template>
  <div>
    <div class="d-flex mt-3">
      <div class="border">
        <div class="view">
          <draggable v-model="news" group="people" @start="drag = true" @end="drag = false">
            <div
              v-for="(article, index) in news"
              :key="index"
              @click="current = article"
              :class="{ active: current == article }"
            >
              <div class="first" v-show="index == 0">
                <img :src="article.picurl" />
                <h2>{{ article.title }}</h2>
              </div>
              <div class="item" v-show="index >= 1">
                <h5>{{ article.title }}</h5>
                <img :src="article.picurl" alt />
              </div>
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
          <image-single-upload :value.sync="current.picurl"></image-single-upload>

          <div class="form-group">
            <label>链接</label>
            <input type="text" class="form-control" v-model="current.url" />
          </div>
        </div>

        <div class>
          <button class="btn btn-outline-danger mt-3" type="button" @click.prevent="del">删除图文消息</button>
        </div>
      </div>
      <textarea name="contents" v-html="news" hidden></textarea>
    </div>
  </div>
</template>

<script>
import ImageSingleUpload from '../../../../resources/js/components/ImageSingleUpload'
import draggable from 'vuedraggable'
export default {
  components: {
    draggable,
  },
  props: {
    id: { type: Number, default: null },
  },
  data() {
    return {
      news: [],
      current: {},
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
      this.news.push({
        title: '',
        description: '',
        picurl: '/images/nopic.jpg',
        url: 'https://',
      })
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
  width: 400px;
  div {
    box-sizing: border-box;
    border: solid 4px transparent;
    &.active {
      border: solid 4px #16a085;
    }
  }
  div.first {
    position: relative;
    padding: 0;
    cursor: pointer;
    img {
      width: 100%;
      height: auto;
      max-height: 200px;
    }
    h2 {
      position: absolute;
      bottom: 0px;
      text-align: center;
      display: block;
      background-color: rgba(0, 0, 0, 0.5);
      left: 0;
      right: 0;
      font-size: 1.2rem;
      padding: 0.5rem 0;
      color: white;
    }
  }
  div.item {
    display: flex;
    align-items: center;
    padding: 10px 0;
    cursor: pointer;
    position: relative;

    h5 {
      font-size: 1rem;
      display: flex;
      align-items: center;
      flex-grow: 1;
      padding: 0 20px;
    }
    img {
      width: 60px;
      height: 60px;
    }
    &:nth-child(even) {
      border-bottom: solid 1px #f3f3f3;
    }
  }
}
</style>
