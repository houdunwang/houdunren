<template>
  <main>
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <Suspense>
          <div class="flex items-center justify-center w-screen h-screen bg-gray-700 overflow-y-auto">
            <component :is="Component" :key="route.fullPath" />
          </div>
        </Suspense>
      </template>
    </RouterView>
  </main>
</template>
