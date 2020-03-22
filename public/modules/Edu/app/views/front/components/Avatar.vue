<template>
  <router-link to="/">
    <img src="http://localhost:3000/images/member-login.jpg" class="rounded" />
  </router-link>
</template>

<script>
export default {
  props: { src: String }
}
</script>

<style lang="scss" scoped>
img {
  width: 50px;
  height: 50px;
}
</style>
