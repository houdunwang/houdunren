<template>
  <div class="loading" v-if="status">
    <a-spin />
    <div class="bg"></div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('loading', ['status'])
  }
}
</script>

<style lang="scss">
.loading {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 2000;
  .ant-spin-lg {
    z-index: 1900;
    .ant-spin-dot {
      font-size: 45px !important;
    }
  }
  .bg {
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.2);
    position: absolute;
    z-index: 999;
  }
}
</style>
