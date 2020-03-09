<template>
  <div class="mb-2">
    <nav class="nav nav-tabs">
      <router-link
        class="nav-link"
        :class="{ active: $route.name === 'admin.system' }"
        :to="{ name: 'admin.system' }"
      >系统课程列表</router-link>
      <router-link
        class="nav-link"
        :class="{ active: $route.name === 'admin.system.create' }"
        :to="{ name: 'admin.system.create' }"
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
export default {
  created() {}
}
</script>

<style></style>
