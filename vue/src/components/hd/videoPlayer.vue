<script setup lang="ts">
import Player from 'xgplayer'
const storage = useStorage()
const { url, urlList } = defineProps<{
  url: string
  urlList?: string[]
}>()
const player = ref<any>()
const emit = defineEmits(['playNextVideo'])
//视频列表，不包括当前视频
const urls = urlList ? urlList.splice(urlList.findIndex((u) => url == u) + 1) : undefined
onMounted(() => {
  player.value = new Player({
    id: 'videoPlayer',
    autoplay: true,
    url,
    lang: 'zh-cn',
    fluid: true,
    poster: '/assets/poster.jpg',
    playbackRate: [1, 1.25, 1.5, 2],
    keyShortcut: 'on',
    rotateFullscreen: true,
    cssFullscreen: true,
    airplay: true,
    playsinline: true,
    'x5-video-player-type': 'h5',
    'x5-video-player-fullscreen': false,
    defaultPlaybackRate: storage.get('playbackrateChange', 1),
    playNext: urls && urls.length ? { urlList: urls } : undefined,
    'x5-video-orientation': 'portraint',
  })

  //播放下一个
  player.value.on('playerNext', (index: number) => {
    emit('playNextVideo', urls ? urls[index - 1] : undefined)
  })

  //更改播放速度
  player.value.on('playbackrateChange', function (v: any) {
    storage.set('playbackrateChange', v.to)
  })
})
defineExpose({
  player,
})
</script>

<template>
  <main class="">
    <div id="videoPlayer" class="z-0"></div>
  </main>
</template>
