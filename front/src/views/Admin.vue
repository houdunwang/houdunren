<template>
  <div class="admin-container">
    <error />
    <navigate />
    <div class="container-fluid bg pt-2">
      <quick-menu class="pt-5 pb-4" />
      <div class="card">
        <div class="card-body">
          <transition name="slide">
            <router-view></router-view>
          </transition>
        </div>
      </div>
      <copyright />
    </div>
  </div>
</template>
<script>
import Navigate from './layouts/Navigate'
import QuickMenu from './layouts/QuickMenu'
import Copyright from './layouts/Copyright'
import Error from './layouts/Error'
import '@/assets/animate.css'

export default {
  components: {
    Error,
    Navigate,
    QuickMenu,
    Copyright
  }
}
</script>
<style lang="scss" scoped>
.bg {
  background-image: url('../assets/bg.jpg');
  height: 100vh;
  background-size: cover;
}
</style>
