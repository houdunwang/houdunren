<template>
  <div>
    <error />
    <loading />
    <keep-alive>
      <headers />
    </keep-alive>
    <a-locale-provider :locale="locale">
      <transition name="fade">
        <!-- <keep-alive>
        <router-view v-if="$route.meta.keepAlive"></router-view>
      </keep-alive>
      <router-view v-if="!$route.meta.keepAlive"></router-view> -->
        <router-view></router-view>
      </transition>
    </a-locale-provider>

    <footers />
  </div>
</template>

<script>
import Error from '@/components/Error'
import Footers from '@/components/Footer'
import Headers from '@/components/Header'
import Loading from '@/components/Loading'
import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'

import store from '@/store'
import { mapState } from 'vuex'
export default {
  async beforeRouteEnter(to, from, next) {
    store.dispatch('site/get').then(response => {
      document.querySelector('title').innerText = response.data.name
    })
    next()
  },
  components: { Headers, Error, Loading, Footers },
  data() {
    return {
      locale: zhCN
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  async created() {}
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
