<template>
  <nav class="nav nav-tabs mb-2">
    <router-link
      class="nav-link"
      :to="{name:'admin.subscribe.index'}"
      :class="{active:$route.name===`admin.subscribe.index`}"
    >订阅列表</router-link>
    <router-link
      class="nav-link"
      :to="{name:'admin.subscribe.create'}"
      :class="{active:$route.name===`admin.subscribe.create`}"
    >添加订阅</router-link>
  </nav>
</template>

<script>
export default {
  created() {}
}
</script>

<style>
</style>
