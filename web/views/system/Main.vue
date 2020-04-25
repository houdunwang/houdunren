<template>
  <div class="admin">
    <error />
    <loading />
    <navigate />
    <div class="container-fluid bg pt-2">
      <quick-menu class="pt-5 pb-4" />
      <div class="card">
        <div class="card-body">
          <keep-alive>
            <router-view v-if="$route.meta.keepAlive"></router-view>
          </keep-alive>
          <router-view v-if="!$route.meta.keepAlive"></router-view>
        </div>
      </div>
      <copyright />
    </div>
  </div>
</template>
<script>
import Navigate from '@/views/layouts/Navigate'
import QuickMenu from '@/views/layouts/QuickMenu'
import Copyright from '@/views/layouts/Copyright'
import Error from '@/components/Error'
import Loading from '@/components/Loading'
import store from '@/store'
export default {
  beforeRouteEnter(to, from, next) {
    store.dispatch('system/getConfig').then(_ => next())
  },
  components: {
    Error,
    Navigate,
    QuickMenu,
    Copyright,
    Loading
  }
}
</script>
<style lang="scss" scoped>
.admin {
  height: 100vh;
  width: 100vw;
  background-image: url('../../assets/images/bg.jpg');
  background-size: cover;
}
</style>
