<script setup lang="ts">
import SpaceMenu from './spaceMenu.vue'
</script>

<template>
  <main class="flex flex-col flex-1 justify-start">
    <FrontTopMenu class="border-b-0" />
    <SpaceMenu />
    <RouterView #default="{ Component, route }">
      <template v-if="Component">
        <KeepAlive>
          <Suspense>
            <component :is="Component" :key="route.fullPath" class="p-2 2xl:w-page mx-auto" />
          </Suspense>
        </KeepAlive>
      </template>
    </RouterView>
    <Footer />
    <FooterMenu />
  </main>
</template>
