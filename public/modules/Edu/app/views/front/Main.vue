<template>
  <div>
    <headers />
    <router-view></router-view>
    <el-backtop> </el-backtop>
  </div>
</template>

<script>
import Headers from './components/Header'
import store from '../../store'
export default {
  components: { Headers },
  async beforeRouteEnter(to, from, next) {
    await store.dispatch('user/get')
    next()
  }
}
</script>

<style>
body {
  background: #f7f7f7;
}
.container {
  /* max-width: 1160px; */
}
.card-header {
  display: flex;
  align-items: center;
  height: 3.5em;
}
</style>
