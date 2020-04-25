<template>
  <div>
    <error />
    <loading />

    <keep-alive>
      <headers />
    </keep-alive>
    <transition name="fade">
      <!-- <keep-alive>
        <router-view v-if="$route.meta.keepAlive"></router-view>
      </keep-alive>
      <router-view v-if="!$route.meta.keepAlive"></router-view> -->
      <router-view></router-view>
    </transition>
    <footers />
  </div>
</template>

<script>
import Headers from './components/Header'
import store from '../../store'
import Error from '@/components/Error'
import Loading from '@/components/Loading'
import Footers from './components/Footer'

export default {
  components: { Headers, Error, Loading, Footers }
}
</script>

<style>
body {
  background: #f7f7f7;
}
.card-header {
  display: flex;
  align-items: center;
  height: 3.5em;
}
</style>
