<template>
  <a-tabs>
    <a-tab-pane key="1" tab="TA 的粉丝">
      <div class="row" v-if="users">
        <div class="col-3 mb-2" v-for="user in users.data" :key="user.id">
          <user :user="user" />
        </div>
      </div>
    </a-tab-pane>
  </a-tabs>
</template>

<script>
import User from '../components/User'

export default {
  components: { User },
  data() {
    return {
      users: null
    }
  },
  created() {
    this.load(1)
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/center/fans/${this.$route.params.id}`)
      this.$set(this, 'users', response.data)
    }
  }
}
</script>

<style></style>
