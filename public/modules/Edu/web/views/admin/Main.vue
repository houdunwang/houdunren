<template>
  <div>
    <error />
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow">
      <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item pr-2">
            <strong class="nav-link pl-1" href="#">
              <i class="fa fa-diamond" aria-hidden="true"></i>
              {{ module.model.title }}
            </strong>
          </li>
          <li class="nav-item pr-2">
            <a href="/admin" class="nav-link">
              <i class="fa fa-sitemap" aria-hidden="true"></i>
              站点列表
            </a>
          </li>
          <li class="nav-item pr-2">
            <a :href="`site/${site.id}/module`" class="nav-link">
              <i class="fa fa-life-ring" aria-hidden="true"></i>
              所有应用
            </a>
          </li>
          <li class="nav-item pr-2">
            <a :href="`${site.domain}/member`" class="nav-link" target="_blank">
              <i class="fa fa-user" aria-hidden="true"></i>
              会员中心
            </a>
          </li>
          <li class="nav-item pr-2">
            <a :href="site.domain" class="nav-link" target="_blank">
              <i class="fa fa-home" aria-hidden="true"></i>
              网站首页
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href class="text-secondary d-flex align-items-center">
              <img :src="user.avatar" class="rounded-circle avatar mr-1" style="width:30px" />
              {{ user.name }}
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="d-flex flex-fill flex-column flex-md-row">
      <div class="menus border-right border-top-0 shadow bg-white">
        <ul
          class="list-group list-group-flush text-left"
          v-for="(menu, index) in menus"
          :key="index"
        >
          <strong
            class="list-group-item list-group-item-light d-flex align-items-center text-dark justify-content-start"
          >
            <i class="fa fa-bars fa-bars mr-1" aria-hidden="true"></i>
            {{ menu.group.title }}
          </strong>
          <router-link
            :to="`${menu.to}?sid=${site.id}`"
            class="list-group-item list-group-item-action"
            v-for="(menu, key) in menu.items"
            :key="key"
          >{{ menu.title }}</router-link>
        </ul>
      </div>
      <div class="flex-fill ml-md-1 pb-5 pt-3 shadow-sm bg-white p-3 border-left border-silver">
        <a-locale-provider :locale="locale">
          <router-view></router-view>
        </a-locale-provider>
      </div>
    </div>
  </div>
</template>
<script>
import Error from '@/components/Error'
import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'
import store from '@/store'
import { mapState } from 'vuex'
export default {
  beforeRouteEnter: async (to, from, next) => {
    if (!to.query.sid) {
      return next(from)
    }
    let response = await Promise.all([
      axios.get(`module/${to.query.sid}/site`),
      axios.get(`module/${to.query.sid}/Edu`),
      axios.get(`module/${to.query.sid}/menu/Edu`)
    ])
    store.commit('site/set', response[0].data)
    store.commit('module/set', response[1].data)
    store.commit('module/setMenus', response[2].data)
    next()
  },
  components: { Error },
  data() {
    return {
      locale: zhCN
    }
  },
  computed: {
    ...mapState('user', ['user']),
    ...mapState('site', ['site']),
    ...mapState('module', ['module', 'menus'])
  },
  provide() {
    return {
      sid: this.$route.query.sid
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
.menus {
  min-height: 100vh;
  min-width: 160px;
}
</style>
