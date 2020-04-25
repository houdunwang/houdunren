<template>
  <div v-if="lessons">
    <div class="container mt-3 mt-md-5 mb-5">
      <div class="search bg-white mt-3 mb-3 shadow-sm p-4 border">
        <div class="input-group input-group">
          <input
            type="text"
            class="form-control"
            placeholder="请输入搜索关键词"
            aria-label="Recipient's username"
            aria-describedby="basic-addon2"
            v-model="searchWord"
          />
          <div class="input-group-append">
            <a href="#" class="input-group-text bg-white" id="basic-addon2" @click.prevent="load">搜索</a>
          </div>
        </div>
        <div class="d-flex justify-content-start flex-wrap mt-3 tags" v-if="tags">
          <a
            href="#"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            @click="
              currentTag = 0
              load()
            "
            >全部</a
          >
          <a
            href="#"
            v-for="tag in tags"
            :key="tag.id"
            @click="
              currentTag = tag.id
              load()
            "
            class="btn  btn-sm mr-3 mb-2 border-0"
            :class="currentTag == tag.id ? 'btn-secondary' : 'btn-outline-secondary'"
          >
            {{ tag.title }}
          </a>
        </div>
      </div>
      <div class="container bg-white p-3 shadow-sm border">
        <div class="row">
          <div
            class="col-12 col-md-4 lesson mb-4 d-flex flex-column justify-content-between"
            v-for="lesson in lessons.data"
            :key="lesson.id"
          >
            <router-link :to="{ name: 'lesson.show', params: { id: lesson.id } }" class="d-block shadow-sm">
              <div class="card">
                <div class="card-body p-0">
                  <img :src="lesson.thumb" />
                </div>
                <div class="card-body lesson-title">{{ lesson.title }}</div>
                <div class="card-footer d-flex justify-content-between text-secondary small bg-light">
                  <span>开始学习</span>
                  <span>
                    <i class="fa fa-film ml-3" aria-hidden="true"></i>
                    {{ lesson.video_count }}节课
                  </span>
                </div>
              </div>
            </router-link>
          </div>
        </div>
        <div class="mt-1">
          <a-pagination v-model="lessons.meta.current_page" :total="lessons.meta.total" showLessItems @change="load" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment'
export default {
  data() {
    return {
      lessons: null,
      tags: null,
      currentTag: 0,
      searchWord: ''
    }
  },
  async created() {
    this.loadTags()
    this.load()
  },
  methods: {
    async loadTags() {
      let response = await this.axios.get(`edu/front/tag`)
      this.$set(this, 'tags', response.data)
    },
    async load(page = 1) {
      let response = await this.axios.get(`edu/front/lesson?page=${page}&tag=${this.currentTag}&w=${this.searchWord}`)
      this.$set(this, 'lessons', response.data)
    },
    time(lesson) {
      return moment(lesson.created_at).fromNow()
    }
  }
}
</script>

<style lang="scss">
.lesson {
  img {
    width: 100%;
  }
  .lesson-title {
    height: 80px;
  }
}
.tags {
  a {
    text-transform: uppercase;
  }
}
</style>
