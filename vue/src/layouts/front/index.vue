<script lang="ts" setup>
import TopMenu from './topMenu.vue'
</script>
<template>
  <main>
    <TopMenu />
    <VideoLearnHistory />
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <KeepAlive>
          <Suspense>
            <component :is="Component" :key="route.fullPath" class="w-full 2xl:w-page mx-auto px-3 mt-5" />
          </Suspense>
        </KeepAlive>
      </template>
    </RouterView>
    <Footer class="mt-32" />
    <FooterMenu />
  </main>
</template>
