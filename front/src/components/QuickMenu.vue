<template>
  <div>
    <div class="d-none d-sm-block">
      <div class="row">
        <div class="col-6 logo"></div>
        <div class="col-6 text-right menu">
          <router-link :to="{name:'site.manage.index'}">
            <i class="fa fa-sitemap fa-2x d-block"></i>网站管理
          </router-link>
          <router-link :to="{name:'system.config.edit'}" v-if="user.is_super_admin">
            <i class="fa fa-support fa-2x d-block"></i>系统设置
          </router-link>
          <a href class="tile" @click.prevent="logout">
            <i class="fa fa-sign-out fa-2x d-block"></i>
            退出
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapActions, mapState} from "vuex";

  export default {
    methods: {
      ...mapActions("user", ["logout"])
    },
    computed: {
      ...mapState("setting", ["setting"]),
      ...mapState("user", {user: 'data'})
    }
  };
</script>

<style lang="scss" scoped>
  .row {
    .logo {
      background-image: url("../assets/logo.png");
      height: 60px;
      background-size: contain;
      background-repeat: no-repeat;
    }

    .menu {
      display: flex;
      flex-direction: row;
      justify-content: flex-end;

      a {
        margin-right: 10px;
        padding: 0.5em 1em 0.5em 1em;
        display: block;
        width: 8em;
        text-align: center;
        text-decoration: none;
        background: #006675;
        color: #eeeeee;
        opacity: 0.8;
        box-shadow: rgba(0, 0, 0, 0.05) 0 2px 4px;

        &:hover {
          opacity: 0.9;
        }
      }
    }
  }
</style>
