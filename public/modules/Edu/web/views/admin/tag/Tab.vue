<template>
  <nav class="nav nav-tabs mb-2">
    <router-link
      class="nav-link"
      :to="{name:'admin.tag.group',query:{sid:site.id}}"
      :class="{active:$route.name==='admin.tag.group'}"
    >标签组</router-link>
    <router-link
      class="nav-link"
      :to="{name:'admin.tag',query:{sid:site.id}}"
      :class="{active:$route.name==='admin.tag'}"
    >标签列表</router-link>
  </nav>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('site', ['site'])
  },
  created() {}
}
</script>

<style>
</style>
