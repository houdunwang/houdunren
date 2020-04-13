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
          />
          <div class="input-group-append">
            <a href="#" class="input-group-text bg-white" id="basic-addon2">搜索</a>
          </div>
        </div>

        <div class="d-flex justify-content-start flex-wrap mt-3 tags">
          <a
            href="https://www.houdunren.com/edu/front/lesson"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >全部</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/2"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >Javascript</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/3"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >laravel</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/4"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >css3</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/5"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >linux</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/6"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >vuejs</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/7"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >HTML5</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/8"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >微信开发</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/10"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >APP</a
          >
          <a href="https://www.houdunren.com/edu/front/tag/11" class="btn btn-outline-secondary btn-sm mr-3 border-0"
            >jquery</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/12"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >工具软件</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/13"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >Mysql</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/14"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >thinkphp</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/15"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >接口开发</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/16"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >react</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/17"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >开源软件</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/18"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >工作生活</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/19"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >docker</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/20"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >mac</a
          >
          <a
            href="https://www.houdunren.com/edu/front/tag/21"
            class="btn btn-outline-secondary btn-sm mr-3 mb-2 border-0"
            >PHP</a
          >
        </div>
      </div>

      <div class="container bg-white p-3 shadow-sm border">
        <div class="row">
          <div
            class="col-12 col-md-4 lesson mb-4 d-flex flex-column justify-content-between"
            v-for="lesson in lessons"
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
          <el-pagination
            class="d-block"
            background
            layout="prev, pager, next"
            :total="total"
            :hide-on-single-page="true"
            @current-change="load"
            :page-size="9"
          ></el-pagination>
        </div>
      </div>
    </div>
    <footers />
  </div>
</template>

<script>
import moment from 'moment'
import Footers from '../components/Footer'
export default {
  components: { Footers },
  data() {
    return {
      lessons: null,
      total: 0
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/front/lesson?page=${page}`)
      this.$set(this, 'lessons', response.data.data)
      this.$set(this, 'total', response.data.meta.total)
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
    // white-space: nowrap;
    // overflow: hidden;
    // text-overflow: ellipsis;
    height: 80px;
  }
}
.tags {
  a {
    text-transform: uppercase;
  }
}
</style>
