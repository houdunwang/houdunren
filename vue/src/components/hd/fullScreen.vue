<script setup lang="ts">
import { ref } from 'vue'
import { OffScreen, FullScreenOne } from '@icon-park/vue-next'

const isFullScreen = ref<boolean>(false)
const fullScreen = () => {
  isFullScreen.value ? document.exitFullscreen() : document.documentElement.requestFullscreen()
  isFullScreen.value = !isFullScreen.value
}

document.addEventListener('fullscreenchange', (e) => {
  isFullScreen.value = Boolean(document.fullscreenElement)
})
</script>

<template>
  <div class="flex items-center cursor-pointer">
    <OffScreen theme="outline" size="20" @click="fullScreen" v-if="isFullScreen" />
    <FullScreenOne theme="outline" size="20" @click="fullScreen" v-else />
  </div>
</template>
