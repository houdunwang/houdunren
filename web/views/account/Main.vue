<template>
  <div :class="[$route.name]">
    <a-row type="flex" justify="center" align="middle" class="app">
      <error />
      <loading />
      <router-view></router-view>
    </a-row>
  </div>
</template>

<script>
import Error from '@/components/Error'
import Loading from '@/components/Loading'
import store from '@/store'
export default {
  components: { Error, Loading },
  computed: {
    bg() {
      return `url('../../assets/images/login.jpg')`
    }
  }
}
</script>

<style lang="scss" scoped>
.app {
  height: 100vh;
  width: 100vw;
  display: flex;
  justify-content: center;
  align-items: center;
}
.register {
  background: url('../../assets/images/register.jpg');
  background-size: cover;
}
.login {
  background: url('../../assets/images/login.jpg');
  background-size: cover;
}
</style>
