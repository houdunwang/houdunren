<template>
  <div>
    <a-tabs>
      <a-tab-pane key="1" tab="TA 的动态">
        <div class="card-body" v-if="!lists">
          <div class="d-flex pt-3 pb-3 border-top" v-for="k in 10" :key="k">
            <a-skeleton avatar active :paragraph="{ rows: 1 }" />
          </div>
        </div>
        <div class="card-body" v-if="lists">
          <div v-for="field in lists.data" :key="field.id">
            <activity :field="field" />
          </div>
          <div class="mt-2">
            <a-pagination
              v-model="lists.meta.current_page"
              :total="lists.meta.total"
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
import Activity from '@/components/Activity'
export default {
  components: { Activity },
  data() {
    return {
      lists: null
    }
  },
  async created() {
    this.load(1)
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/center/${this.$route.params.id}/activity`)
      this.$set(this, 'lists', response.data)
    }
  }
}
</script>

<style></style>
