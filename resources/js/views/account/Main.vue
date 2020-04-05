<template>
  <a-row type="flex" justify="center" align="middle" class="app">
    <error />
    <loading />
    <router-view></router-view>
  </a-row>
</template>

<script>
import Error from '@/components/Error'
import Loading from '@/components/Loading'
import store from '@/store'
export default {
  components: { Error, Loading }
}
</script>

<style lang="scss">
.app {
  height: 100vh;
  width: 100vw;
  background: url('../../assets/images/system-login.jpg');
  background-size: cover;
}
</style>
