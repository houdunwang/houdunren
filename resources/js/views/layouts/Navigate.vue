<template>
  <div class="bg-dark">
    <a-layout id="components-layout-demo-top-side">
      <a-layout-header class="header">
        <a-menu theme="dark" mode="horizontal" :style="{ lineHeight: '55px' }">
          <a-menu-item
            :key="index"
            v-for="(menu, index) in menus"
            v-show="menu.check ? user.is_super_admin : true"
          >
            <router-link :to="menu.url">
              <i :class="'fa ' + menu.icon"></i>
              {{ menu.title }}
            </router-link>
          </a-menu-item>
        </a-menu>
        <a-dropdown placement="bottomRight">
          <a class="ant-dropdown-link" @click="e => e.preventDefault()">
            {{ user.name }}
            <a-icon type="down" />
          </a>
          <a-menu slot="overlay">
            <a-menu-item>
              <a class="dropdown-item" href="/logout">退出登录</a>
            </a-menu-item>
          </a-menu>
        </a-dropdown>
      </a-layout-header>
    </a-layout>
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
          url: { name: 'site' },
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
