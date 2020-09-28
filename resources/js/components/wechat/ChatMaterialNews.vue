<template>
  <div>
    <div>
      <chat-list :id.sync="wechat_id" v-if="!wechat_id"></chat-list>
    </div>

    <div class="d-flex mt-3" v-if="wechat_id">
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
            <input type="text" class="form-control" v-model="current.title" required />
          </div>

          <div class="form-group">
            <label>作者</label>
            <input type="text" class="form-control" v-model="current.author" />
          </div>

          <div class="form-group">
            <label>显示封面图片</label>
            <div class="form-check form-check-inline">
              <input id="show_cover_pic1" class="form-check-input" type="radio" v-model="current.show_cover_pic" value="1" />
              <label for="show_cover_pic1" class="form-check-label">显示</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="show_cover_pic0" class="form-check-input" type="radio" v-model="current.show_cover_pic" value="0" />
              <label for="show_cover_pic0" class="form-check-label">不显示</label>
            </div>
          </div>

          <div class="form-group">
            <label>是否打开评论</label>
            <div class="form-check form-check-inline">
              <input id="need_open_comment1" class="form-check-input" type="radio" v-model="current.need_open_comment" value="1" />
              <label for="need_open_comment1" class="form-check-label">打开</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="need_open_comment0" class="form-check-input" type="radio" v-model="current.need_open_comment" value="0" />
              <label for="need_open_comment0" class="form-check-label">关闭</label>
            </div>
          </div>

          <div class="form-group">
            <label>是否粉丝才可评论</label>
            <div class="form-check form-check-inline">
              <input id="only_fans_can_comment1" class="form-check-input" type="radio" v-model="current.only_fans_can_comment" value="1" />
              <label for="only_fans_can_comment1" class="form-check-label">所有人可评论</label>
            </div>
            <div class="form-check form-check-inline">
              <input id="only_fans_can_comment0" class="form-check-input" type="radio" v-model="current.only_fans_can_comment" value="0" />
              <label for="only_fans_can_comment0" class="form-check-label">粉丝才可评论</label>
            </div>
          </div>
          <div class="form-group">
            <label>源文地址</label>
            <input type="text" class="form-control" v-model="current.content_source_url" />
          </div>
          <div class="form-group">
            <label>简介</label>
            <textarea class="form-control" v-model="current.digest" rows="3"></textarea>
          </div>

          <image-upload :value.sync="current.picurl"></image-upload>
          <wang-editor :value.sync="current.content" :uploadImgServer="'/common/upload/wangEditorMaterialNewsUpload/' + wechat_id"></wang-editor>
        </div>

        <div class>
          <button class="btn btn-outline-danger mt-3" type="button" @click.prevent="del">删除图文消息</button>
        </div>
      </div>
      <textarea name="content" v-html="news" hidden></textarea>
    </div>
    <button class="btn btn-primary mt-3" @click.prevent="submit">保存提交</button>
  </div>
</template>

<script>
import draggable from 'vuedraggable'

const field = { title: '', thumb_media_id: '', author: '', digest: '', show_cover_pic: 1, content: '', content_source_url: '', need_open_comment: 0, only_fans_can_comment: 1, picurl: '' }

export default {
  components: {
    draggable,
  },

  props: {
    id: { type: Number, default: null },
  },

  data() {
    return {
      wechat_id: 0,
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
        const response = await this.axios.get(`/wechat/material/${this.id}`)
        this.news = response.content
        this.wechat_id = response.wechat_id
        this.initCurrent()
      }
    },

    initCurrent() {
      this.current = this.news[0]
    },

    add() {
      this.news.push(Object.assign({}, field))
      this.current = this.news[this.news.length - 1]
    },

    del() {
      if (this.news.length == 1) {
        return this.$message.error('最少要有一个图文消息')
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

    async submit() {
      let msg = ''
      if (this.wechat_id == 0) {
        msg = '请选择微信公众号'
      }
      if (msg) {
        return this.$message.error(msg)
      }
      if (this.id) {
        const response = await this.axios.put(`/wechat/material/${this.id}?type=news`, { wechat_id: this.wechat_id, content: this.news })
      } else {
        const response = await this.axios.post(`/wechat/material?type=news`, { wechat_id: this.wechat_id, content: this.news })
      }
      location.href = '/wechat/material?type=news'
    },
  },
}
</script>

<style lang="scss">
.view {
  width: 350px;
}
</style>
