<template>
  <div class="account d-flex justify-content-center pt-5">
    <div class="col-12 col-sm-5 pt-5">
      <div class="card shadow-sm mt-5">
        <div class="card-header font-weight-bold">
          <slot name="header"></slot>
        </div>
        <div class="card-body">
          <slot name="body"></slot>
        </div>
        <div class="card-footer text-muted small">
          <slot name="footer" :site="site"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {
    site() {
      return "后盾人 人人做后盾";
    }
  }
};
</script>

<style lang="scss" scoped>
.account {
  background: #f3f3f3;
  width: 100vw;
  height: 100vh;
}
</style>
