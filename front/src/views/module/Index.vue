<template>
  <div class="admin-container">
    <error />
    <top-menu />
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-xl-2 mt-3 menus">
          <div v-for="module in modules" :key="module">
            <div class="card-header border">{{module.package.title}}</div>
            <div class="list-group">
              <div v-for="menu in module.menus.admin" :key="menu">
                <a
                  @click.prevent="to(m,'iframe')"
                  v-for="m in menu"
                  :key="m.name"
                  class="list-group-item list-group-item-action"
                >{{m.title}}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-xl-10 mt-3 content p-0 flex-grow-1">
          <router-view v-show="routerViewState"></router-view>
          <iframe v-show="!routerViewState" name="iframe" id="iframe"></iframe>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import TopMenu from "./commponents/TopNavbar";

export default {
  data() {
    return {
      modules: [],
      routerViewState: true
    };
  },
  components: {
    TopMenu
  },
  async created() {
    let response = await this.axios.get(
      `/module/${this.$route.params.id}/module`
    );
    this.$set(this, "modules", response.data.data);
  },
  methods: {
    to(menu, type) {
      if (type === "iframe") {
        this.routerViewState = false;
        window.open(menu.url, "iframe");
      } else {
        this.routerViewState = true;
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.admin-container {
  background-size: cover;
  height: 100vh;
  .container-fluid {
    .row {
      .content {
        /*height: 95vh;*/
      }
      iframe {
        border: none;
        height: 100vh;
      }
    }
  }
}

.list-group-item {
  &:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

.content {
  #iframe {
    width: 100%;
    height: 100vh;
  }
}

.menus {
  div {
    border-radius: 0 !important;

    a {
      border-radius: 0 !important;
    }

    &:nth-of-type(n + 2) {
      div:first-child {
        border-top: none !important;
      }
    }
  }
}
</style>
