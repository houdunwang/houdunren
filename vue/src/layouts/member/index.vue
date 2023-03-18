<script setup lang="ts">
import navbar from './memberNavbar.vue'
import menuData from './menuData'
import UserBlock from './userBlock.vue'
const userStore = useUserStore()
const active = ref('')
</script>
<template>
  <main class="flex flex-col flex-1 justify-start">
    <navbar />
    <section class="2xl:w-page 2xl:mx-auto mt-5 flex flex-col md:flex-row md:items-start gap-5 p-2">
      <div class="md:w-[160px] hidden md:block">
        <UserBlock :user="userStore.user" class="rounded-md" />
        <div class="menu lg:mt-3 rounded-md">
          <router-link
            v-for="(menu, index) of menuData"
            :key="index"
            :to="{ name: menu.routeName }"
            :class="{ active: $route.name == menu.routeName }"
            @click="active = menu.routeName">
            {{ menu.title }}
          </router-link>
        </div>
      </div>
      <RouterView #default="{ Component, route }">
        <template v-if="Component">
          <KeepAlive>
            <Suspense>
              <component
                :is="Component"
                :key="route.fullPath"
                class="bg-white p-5 border rounded-lg flex-1 shadow-sm" />
            </Suspense>
          </KeepAlive>
        </template>
      </RouterView>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.menu {
  @apply flex flex-col overflow-hidden;
  a {
    @apply bg-white flex py-3 text-sm px-5 border-b opacity-90 text-gray-700 duration-300;
    &.active {
      @apply bg-gray-200;
    }
  }
}
</style>
