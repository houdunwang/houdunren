<template>
  <div>
    <div class="d-none d-sm-block">
      <div class="row">
        <div class="col-6 logo" :style="{ color: 'red', backgroundImage: `url(${logo})` }"></div>
        <div class="col-6 menu">
          <router-link :to="{ name: 'site' }"> <i class="fa fa-sitemap fa-2x"></i>网站管理 </router-link>
          <router-link :to="{ name: 'system' }" v-if="user.is_super_admin">
            <i class="fa fa-support fa-2x"></i>系统设置
          </router-link>
          <a href="/admin/logout">
            <i class="fa fa-sign-out fa-2x"></i>
            退出
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import _ from 'lodash'
export default {
  computed: {
    ...mapState('user', { user: 'data' }),
    ...mapState('systemConfig', { config: 'data' }),
    logo() {
      return _.get(this.config, 'base.logo.value', require('@/assets/images/training.png'))
    }
  }
}
</script>
<style lang="scss" scoped>
.row {
  .logo {
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
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 7.5rem;
      height: 5rem;
      background: #fff;
      color: #333;
      opacity: 0.7;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
      border-radius: 5px;
      transition: 0.5s;

      &:hover {
        opacity: 0.9;
      }
    }
  }
}
</style>
