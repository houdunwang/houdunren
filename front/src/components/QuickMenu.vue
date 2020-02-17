<template>
  <div>
    <div class="d-none d-sm-block">
      <div class="row">
        <div class="col-6 logo"></div>
        <div class="col-6 text-right menu">
          <router-link :to="{name:'site.index'}">
            <i class="fa fa-sitemap fa-2x d-block"></i>网站管理
          </router-link>
          <router-link to="/system/index" v-if="user.is_super_admin">
            <i class="fa fa-support fa-2x d-block"></i>系统设置
          </router-link>
          <a href class="tile" @click.prevent="adminLogout">
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
      ...mapActions("user", ["adminLogout"]),
    },
    computed: {
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
      background-position: 20px 0;
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
        background: #fff;
        color: #333;
        opacity: 0.7;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        transition: .5s;

        &:hover {
          opacity: 0.9;
        }
      }
    }
  }
</style>
