<template>
  <div class="navigate shadow-sm">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand" href="#"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li
              class="nav-item mr-4"
              :key="index"
              v-for="(menu, index) in menus"
              v-show="menu.check ? user.is_super_admin : true"
            >
              <router-link class="nav-link" :to="menu.url">
                <i :class="'fa ' + menu.icon"></i>
                {{ menu.title }}
              </router-link>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fa fa-user"></i>
                  {{ user.name }}
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="#">修改资料</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" @click.prevent="logout"
                    >退出登录</a
                  >
                </div>
              </li>
            </ul>
          </form>
        </div>
      </nav>
    </div>
  </div>
</template>
<script>
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
      menus: [
        {
          title: "返回站点管理",
          icon: "fa fa-reply",
          url: "/site/index",
          check: false
        },
        {
          title: "全部应用",
          icon: "fa fa-cubes",
          url: `/module/home/${this.$route.params.id}`,
          check: false
        }
      ]
    };
  },
  computed: {
    ...mapState("user", { user: "data" })
  },
  methods: {
    ...mapActions("user", ["logout"])
  }
};
</script>
<style lang="scss" scoped>
.navigate {
  background-color: #293145;
  opacity: 0.95;
  position: relative;
  z-index: 1;
}
</style>
