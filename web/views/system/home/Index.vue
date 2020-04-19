<template>
  <div>
    <dl v-for="(menu, i) in menus" :key="i">
      <dt>{{ menu.title }}</dt>
      <dd>
        <div :key="n" v-for="(menu, n) in menu.children">
          <router-link :to="menu.url" class="tile d-block shadow-sm">
            <i :class="`fa fa-2x d-block ${menu.icon}`"></i>
            {{ menu.title }}
          </router-link>
        </div>
      </dd>
    </dl>
  </div>
</template>
<script>
export default {
  data() {
    return {
      menus: [
        {
          title: '应用扩展',
          children: [{ title: '模块', icon: 'fa fa-cubes', url: { name: 'system.module' } }]
        },
        {
          title: '用户管理',
          children: [
            { title: '我的帐户', icon: 'fa-briefcase', url: { name: 'system.user' } },
            { title: '用户组管理', icon: 'fa-users', url: { name: 'system.group' } },
            { title: '服务套餐', icon: 'fa-comments-o', url: { name: 'system.package' } }
          ]
        },
        {
          title: '系统管理',
          children: [
            { title: '站点列表', icon: 'fa-sitemap', url: '/site/index' },
            {
              title: '系统配置',
              icon: 'fa-tachometer',
              url: { name: 'system.config' }
            },
            {
              title: '更新缓存',
              icon: 'fa-refresh',
              url: { name: 'system.cache.update' }
            }
          ]
        }
      ]
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
dt {
  margin-bottom: 20px;
  margin-top: 20px;
  color: #666;

  &::before {
    content: '';
    position: relative;
    top: 5px;
    display: inline-block;
    width: 5px;
    height: 20px;
    margin-right: 15px;
    background: #333;
  }
}

dd {
  display: flex;
  margin-bottom: 50px;

  .tile {
    margin-right: 10px;
    padding: 10px;
    display: block;
    width: 8em;
    text-align: center;
    color: #000;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e7eaf3;
    border-radius: 0.3125rem;
    cursor: pointer;
    i {
      font-size: 2em;
      display: block;
      margin-bottom: 5px;
    }

    &:hover {
      opacity: 0.9;
      border: solid 1px #ddd;
    }
  }
}
</style>
