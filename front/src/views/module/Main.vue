<template>
  <div class="admin-container">
    <error/>
    <top-navbar/>
      <div class="card m-2 m-3 mt-5">
        <div class="card-header">
          网站模块应用
        </div>
        <div class="card-body">
          <transition name="slide">
            <router-view></router-view>
          </transition>
        </div>
      </div>
  </div>
</template>
<script>
  import Error from '@/components/Error'
  import TopNavbar from "./commponents/TopNavbar";

  export default {
    components: {
      Error, TopNavbar
    },
  };
</script>
<style lang="scss" scoped>
  .admin-container {
    background-image: url("../../assets/bg.jpg");
    height: 100vh;
    /*background: #F3F4F6;*/
    background-size: cover;
  }
</style>
