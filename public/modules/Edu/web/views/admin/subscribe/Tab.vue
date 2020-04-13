<template>
  <nav class="nav nav-tabs mb-2">
    <router-link
      class="nav-link"
      :to="{name:'admin.subscribe'}"
      :class="{active:$route.name===`admin.subscribe`}"
    >订阅列表</router-link>
    <router-link
      class="nav-link"
      :to="{name:'admin.subscribe.create'}"
      :class="{active:$route.name===`admin.subscribe.create`}"
    >添加订阅</router-link>
    <router-link
      v-if="$route.name==='admin.subscribe.edit'"
      class="nav-link"
      :to="{name:'admin.subscribe.edit',params:{id:$route.params.id}}"
    >Disabled link</router-link>
  </nav>
</template>

<script>
export default {
  created() {}
}
</script>

<style>
</style>
