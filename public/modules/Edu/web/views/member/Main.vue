<template>
  <div>
    <headers />
    <error />
    <div class="container mt-3 mb-5 p-0 p-sm-1">
      <div class="row">
        <error />
        <div class="col-12 col-sm-10">
          <div class="bg-white border rounded p-3 shadow-sm">
            <a-locale-provider :locale="locale">
              <router-view></router-view>
            </a-locale-provider>
            <div class="pt-3"></div>
          </div>
        </div>
        <div class="col-sm-2 col-12 p-0 pt-2 p-sm-0">
          <user :user="user" class="mb-2" :fansBtn="false" />
          <div class="card rounded shadow-sm bg-white">
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <router-link
                  :to="{ name: 'member.order.index' }"
                  class="list-group-item list-group-item-action text-secondary"
                >
                  我的订单
                </router-link>
                <router-link
                  :to="{ name: 'member.lesson.index' }"
                  class="list-group-item list-group-item-action text-secondary"
                >
                  课程收藏
                </router-link>
                <router-link
                  :to="{ name: 'member.video.index' }"
                  class="list-group-item list-group-item-action text-secondary"
                >
                  视频收藏
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footers />
  </div>
</template>
<script>
import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'
import Headers from '@/components/Header'
import Error from '@/components/Error'
import Footers from '@/components/Footer'
import User from '@/components/User'

import { mapState } from 'vuex'
export default {
  components: { Error, Headers, Footers, User },
  data() {
    return {
      locale: zhCN
    }
  },
  mounted() {
    $(function() {
      $('[data-toggle="popover"]').popover({
        container: 'body'
      })
    })
  },
  computed: {
    ...mapState('user', ['user'])
  }
}
</script>

<style lang="scss" scoped>
.menu {
  background: #f8f9fa;
  border-top: solid 4px #17a2b8 !important;
}
</style>
