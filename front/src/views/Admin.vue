<template>
  <div class="admin-container">
    <error/>
    <navigate/>
    <quick-menu class="m-3 mt-5"/>
    <div class="card m-2 m-3 mt-5">
      <div class="card-body">
        <transition name="slide">
          <router-view></router-view>
        </transition>
      </div>
    </div>
    <copyright/>
  </div>
</template>
<script>
  import Navigate from "@/components/Navigate";
  import QuickMenu from "@/components/QuickMenu";
  import Copyright from "@/components/Copyright";
  import Error from '@/components/Error'

  export default {
    components: {
      Error,
      Navigate,
      QuickMenu,
      Copyright,
    },
  };
</script>
<style lang="scss" scoped>
  .admin-container {
    background-image: url("../assets/bg.jpg");
    height: 100vh;
    background-size: cover;
  }
</style>
