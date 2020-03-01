<template>
  <div>
    <error />
    <ModuleNavbar />
    <div class="mt-3 container-fluid">
      <div class="row">
        <div class="col-12 col-md-2 menus">
          <div class="list-group rounded-0" v-for="(menus, title) in menus" :key="title">
            <a href="#" class="list-group-item bg-light disabled rounded-0">{{ title }}</a>
            <a
              v-for="menu in menus"
              :key="menu.id"
              :href="menu.url"
              target="iframe"
              class="menu list-group-item list-group-item-action rounded-0"
              >{{ menu.title }}</a
            >
          </div>
        </div>
        <div class="col-12 col-md-10 mt-2 mt-md-0 pr-1 pl-1">
          <div class="content">
            <iframe src name="iframe" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ModuleNavbar from './layouts/ModuleNavbar'
import Error from './layouts/Error'
import _ from 'lodash'
export default {
  components: {
    Error,
    ModuleNavbar
  },
  data() {
    return {
      menus: []
    }
  },
  async created() {
    let response = await this.axios
      .get(`module/${this.$route.params.sid}/menu/${this.$route.params.mid}`)
      .then(r => r.data.data)
    this.$set(this, 'menus', response)

    //没有菜单时跳转到首页
    if (this.menus.length == 0) {
      // this.$router.push({ name: 'site' })
    }
    //自动打开第一个菜单
    window.open(_.values(this.menus)[0][0], 'iframe')
  }
}
</script>
<style lang="scss" scoped>
.menus {
  .list-group:not(:last-of-type) a:last-of-type {
    border-bottom: none;
  }
}
.content {
  height: 90vh;
  iframe {
    width: 100%;
    height: 100%;
  }
}
</style>
