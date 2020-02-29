<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'system' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link :class="{ 'nav-link': true, active: $route.name === 'system.group' }" :to="{ name: 'system.group' }"
        >用户组列表
      </router-link>
      <router-link
        :class="{ 'nav-link': true, active: $route.name === 'system.group.add' }"
        :to="{ name: 'system.group.add' }"
        >添加用户组
      </router-link>
      <router-link
        :class="{ 'nav-link': true, active: $route.name === 'system.group.edit' }"
        :to="{ name: 'system.group.add' }"
        v-if="$route.name === 'system.group.edit'"
        >编辑用户组
      </router-link>
    </nav>
    <slot></slot>
  </div>
</template>

<script>
export default {}
</script>

<style scoped></style>
