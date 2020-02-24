<template>
  <div class="admin-container">
    <error />
    <navigate />
    <div class="container-fluid">
      <quick-menu class="m-3 mt-5" />
      <div class="card mt-5">
        <div class="card-body">
          <transition name="slide">
            <router-view></router-view>
          </transition>
        </div>
      </div>
      <copyright />
    </div>
  </div>
</template>
<script>
import Navigate from "./layouts/Navigate";
import QuickMenu from "./layouts/QuickMenu";
import Copyright from "./layouts/Copyright";
import Error from "./layouts/Error";
import "@/assets/animate.css";

export default {
  components: {
    Error,
    Navigate,
    QuickMenu,
    Copyright
  }
};
</script>
<style lang="scss">
body {
  background-image: url("../assets/bg.jpg");
  height: 100vh;
  background-size: cover;
}
</style>
