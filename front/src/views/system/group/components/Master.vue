<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link :class="{'nav-link':true,active:routerName==='system.group.index'}"
                   :to="{name:'system.group.index'}">用户组列表
      </router-link>
      <router-link :class="{'nav-link':true,active:routerName==='system.group.add'}"
                   :to="{name:'system.group.add'}">添加用户组
      </router-link>
      <router-link :class="{'nav-link':true,active:routerName==='system.group.edit'}"
                   :to="{name:'system.group.add'}"
        v-if="routerName==='system.group.edit'">编辑用户组
      </router-link>
    </nav>
    <slot></slot>
  </div>
</template>

<script>
  export default {
    name: "Tab",
    computed: {
      routerName() {
        return this.$route.name;
      }
    },
  }
</script>

<style scoped>

</style>
