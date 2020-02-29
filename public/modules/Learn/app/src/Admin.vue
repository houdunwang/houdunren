<template>
  <div class="d-flex flex-column flex-md-row justify-content-between">
    <div class="group p-5"></div>
    <div class="menu p-5">2</div>
    <div class="content flex-fill">3</div>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  created() {},
  methods: {}
}
</script>

<style lang="scss" scoped>
.d-flex {
  height: 100vh;
  .group {
    background: red;
  }
  .menu {
    background: green;
  }
  .content {
    background: #000;
  }
}
</style>
