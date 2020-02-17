<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link :class="{'nav-link':true,active:routerName==='system.package.index'}"
                   :to="{name:'system.package.index'}">套餐列表
      </router-link>
      <router-link :class="{'nav-link':true,active:routerName==='system.package.add'}"
                   :to="{name:'system.package.add'}">添加套餐
      </router-link>
      <router-link :class="{'nav-link':true,active:routerName==='system.package.edit'}"
                   :to="{name:'system.package.add'}"
        v-if="routerName==='system.package.edit'">编辑套餐
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
