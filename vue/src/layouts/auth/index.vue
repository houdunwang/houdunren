<template>
  <main>
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <div class="flex items-center justify-center h-screen bg-gray-700 px-5">
          <component :is="Component" :key="route.fullPath" class="flex-1 flex justify-center" />
        </div>
      </template>
    </RouterView>
  </main>
</template>
