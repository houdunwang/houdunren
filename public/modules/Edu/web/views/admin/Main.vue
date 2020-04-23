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
          v-for="(menu,index) in menus"
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
            v-for="(menu,key) in menu.items"
            :key="key"
          >{{ menu.title }}</router-link>
        </ul>
      </div>
      <div class="flex-fill ml-md-0 pb-5 pt-3 shadow-sm bg-light p-3 border-left1 border-silver">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
import Error from '../components/Error'
import store from '@/store'
import { mapState } from 'vuex'
export default {
  beforeRouteEnter: async (to, from, next) => {
    let response = await Promise.all([
      axios.get(`admin/site?sid=${to.query.sid}`),
      axios.get(`admin/module/Edu?sid=${to.query.sid}`),
      axios.get(`admin/menu/Edu?sid=${to.query.sid}`)
    ])
    store.commit('site/set', response[0].data)
    store.commit('module/set', response[1].data)
    store.commit('module/setMenus', response[2].data)
    next()
  },
  components: { Error },
  computed: {
    ...mapState('user', ['user']),
    ...mapState('site', ['site']),
    ...mapState('module', ['module', 'menus'])
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
