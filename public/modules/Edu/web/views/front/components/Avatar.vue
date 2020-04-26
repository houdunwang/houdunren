<template>
  <router-link to="/">
    <img :src="src" class="rounded" />
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
