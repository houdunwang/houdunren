<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'system' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link
        :class="{ 'nav-link': true, active: $route.name === 'system.package' }"
        :to="{ name: 'system.package' }"
      >套餐列表</router-link>

      <router-link
        :class="{ 'nav-link': true, active: $route.name === 'system.package.add' }"
        :to="{ name: 'system.package.add' }"
      >添加套餐</router-link>
      <router-link
        :class="{ 'nav-link': true, active: $route.name === 'system.package.edit' }"
        :to="{ name: 'system.package.add' }"
        v-if="$route.name === 'system.package.edit'"
      >编辑套餐</router-link>
    </nav>
    <slot />
  </div>
</template>

<script>
export default {}
</script>

<style scoped></style>
