<template>
  <div>
    <router-view></router-view>
    <error />
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Error from '@/components/Error'
import store from '@/store'
export default {
  async beforeRouteEnter(to, from, next) {
    await store.dispatch('user/get')
    next()
  },
  components: { Error }
}
</script>

<style></style>
