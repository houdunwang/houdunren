<script lang="ts" setup></script>
<template>
  <main>
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <component :is="Component" :key="route.fullPath" class="w-full 2xl:w-page mx-auto p-3 lg:mt-5" />
      </template>
    </RouterView>
  </main>
</template>
