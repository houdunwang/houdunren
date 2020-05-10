<template>
  <div>
    <a-tabs>
      <a-tab-pane key="1" tab="TA 的贴子">
        <div class="card-body" v-if="!topics">
          <div class="d-flex pt-3 pb-3 border-top" v-for="k in 10" :key="k">
            <a-skeleton avatar active :paragraph="{ rows: 1 }" />
          </div>
        </div>
        <div class="card-body" v-if="topics">
          <div v-for="topic in topics.data" :key="topic.id">
            <topic :topic="topic" />
          </div>
          <div class="mt-2">
            <a-pagination
              v-model="topics.meta.current_page"
              :total="topics.meta.total"
              showLessItems
              @change="load"
              :hideOnSinglePage="true"
            />
          </div>
        </div>
      </a-tab-pane>
    </a-tabs>
  </div>
</template>

<script>
import Topic from '@/components/Topic'

export default {
  components: { Topic },
  data() {
    return {
      topics: null
    }
  },
  async created() {
    this.load(1)
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/center/${this.$route.params.id}/topic`)
      this.$set(this, 'topics', response.data)
    }
  }
}
</script>

<style></style>
