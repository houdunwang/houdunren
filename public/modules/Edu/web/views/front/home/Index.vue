<template>
  <div>
    <div class="container mt-3 mt-md-5 mb-5">
      <div class="row">
        <div class="col-12 col-sm-9 mt-2">
          <div class="card">
            <div class="card-header bg-white d-flex justify-content-between">
              社区动态
              <router-link
                :to="{ name: 'topic.create' }"
                class="btn btn-outline-secondary btn-sm"
              >发表</router-link>
            </div>
            <div class="card-body" v-if="activity.data">
              <activity :field="field" v-for="field in activity.data" :key="field.id" />
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
export default {
  name: 'home',
  components: { Tip, Activity },
  data() {
    return {
      activity: {}
    }
  },
  created() {
    this.load()
  },
  methods: {
    async load(page = 1) {
      const response = await this.axios.get(`edu/front/activity?page=${page}`)
      this.$set(this, 'activity', response.data)
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
