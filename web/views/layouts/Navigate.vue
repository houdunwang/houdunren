<template>
  <div class="bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
          <li
            class="nav-item mr-3"
            :key="index"
            v-for="(menu, index) in menus"
            v-show="menu.check ? user.is_super_admin : true"
          >
            <router-link class="nav-link font-weight-light" :to="menu.url">
              <i :class="'fa ' + menu.icon"></i>
              {{ menu.title }}
            </router-link>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0 dropdown">
          <a
            class="dropdown-toggle text-white"
            href="#"
            id="dropdownId"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >{{ user.name }}</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">退出登录</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
import { mapState } from 'vuex'
export default {
  data() {
    return {
      menus: [
        {
          title: '站点管理',
          icon: 'fa fa-sitemap',
          url: { name: 'site.index' },
          check: false
        },
        {
          title: '模块管理',
          icon: 'fa-cubes',
          url: { name: 'system.module' },
          check: true
        },
        {
          title: '服务套餐',
          icon: 'fa-comments-o',
          url: { name: 'system.package' },
          check: true
        },
        {
          title: '系统设置',
          icon: 'fa-support',
          url: { name: 'system' },
          check: true
        },
        {
          title: '会员组',
          icon: 'fa-users',
          url: { name: 'system.group' },
          check: true
        },
        {
          title: '更新缓存',
          icon: 'fa-bitbucket',
          url: { name: 'system.cache.update' },
          check: true
        }
      ]
    }
  },
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
header {
  height: 55px;
  padding: 0 10px;
  line-height: 55px;
}
.ant-dropdown-link {
  position: absolute;
  right: 20px;
  top: 0px;
  color: #fff;
  opacity: 0.6;
  &:hover {
    color: #fff;
  }
}
</style>
