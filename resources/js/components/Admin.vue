<template>
  <div class="hdcms">
    <navigate />
    <quick-menu class="m-3 mt-5" />
    <div class="card m-2 m-3 mt-5">
      <div class="card-body">
        <transition name="slide-fade">
          <router-view></router-view>
        </transition>
      </div>
    </div>
    <copyright />
  </div>
</template>
<script>
import Navigate from "./common/Navigate";
import Copyright from "./common/Copyright";
import QuickMenu from "./common/QuickMenu";
import { mapActions } from "vuex";
export default {
  components: {
    Navigate,
    Copyright,
    QuickMenu
  },
  mounted() {
    this.get();
    this.getSetting();
  },
  methods: {
    ...mapActions("user", ["get"]),
    ...mapActions("setting", {
      getSetting: "get"
    })
  },
  computed: {}
};
</script>
<style lang="scss">
.hdcms {
  background-image: url("../../images/bg.jpg");
  height: 100vh;
}
</style>
