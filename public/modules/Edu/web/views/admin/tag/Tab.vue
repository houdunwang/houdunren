<template>
  <nav class="nav nav-tabs mb-2">
    <router-link
      class="nav-link"
      :to="{name:'admin.tag.group'}"
      :class="{active:$route.name==='admin.tag.group'}"
    >标签组</router-link>
    <router-link
      class="nav-link"
      :to="{name:'admin.tag'}"
      :class="{active:$route.name==='admin.tag'}"
    >标签列表</router-link>
  </nav>
</template>

<script>
export default {
  created() {}
}
</script>

<style>
</style>
