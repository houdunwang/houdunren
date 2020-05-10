<template>
  <div>
    <div class="container mt-3 mt-md-5 mb-5">
      <div class="row">
        <div class="col-12 col-sm-9 mt-2">
          <div class="card">
            <div class="card-header bg-white d-flex justify-content-between">
              社区动态
              <router-link :to="{ name: 'topic.create' }" class="btn btn-outline-secondary btn-sm">发表</router-link>
            </div>
            <div class="card-body" v-if="activity.data">
              <topic :topic="topic" v-for="topic in topics" :key="topic.id" />
            </div>
            <div class="card-body" v-if="activity.data">
              <activity :field="field" v-for="field in activity.data" :key="field.id" />
              <a-pagination
                v-model="activity.meta.current_page"
                :total="activity.meta.total"
                showLessItems
                @change="load"
                :hideOnSinglePage="true"
              />
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-3 mt-2 pl-0">
          <tip />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Tip from '../components/Tips'
import Activity from '@/components/Activity'
import Topic from '@/components/Topic'
export default {
  name: 'home',
  components: { Tip, Activity, Topic },
  data() {
    return {
      activity: {},
      topics: []
    }
  },
  created() {
    this.load()
    this.recommend()
  },
  methods: {
    async load(page = 1) {
      const response = await this.axios.get(`edu/front/activity?page=${page}`)
      this.$set(this, 'activity', response.data)
    },
    async recommend() {
      const response = await this.axios.get(`edu/front/recommend/topic`)
      this.$set(this, 'topics', response.data)
    }
  }
}
</script>
<style lang="scss" scoped>
.dynamic {
  img {
    width: 50px;
    height: 50px;
  }
}
</style>
