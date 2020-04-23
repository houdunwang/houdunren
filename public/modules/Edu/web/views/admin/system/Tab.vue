<template>
  <div class="mb-2">
    <nav class="nav nav-tabs">
      <router-link
        class="nav-link"
        :class="{ active: $route.name === 'admin.system.index' }"
        :to="{ name: 'admin.system',query:{sid:site.id} }"
      >系统课程列表</router-link>
      <router-link
        class="nav-link"
        :class="{ active: $route.name === 'admin.system.create' }"
        :to="{ name: 'admin.system.create',query:{sid:site.id} }"
      >发表课程</router-link>
      <router-link
        class="nav-link active"
        v-if="$route.name === 'admin.system.edit' "
        :to="$route.fullPath"
      >修改课程</router-link>
    </nav>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('site', ['site'])
  }
}
</script>

<style></style>
