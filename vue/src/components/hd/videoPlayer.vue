<script setup lang="ts">
import Player, { Events } from 'xgplayer'
import 'xgplayer/dist/index.min.css'
const storage = useStorage()
const { url, urlList } = defineProps<{
  url: string
  urlList?: string[]
}>()

const player = ref<Player>()
// const emit = defineEmits(['playNextVideo'])
//视频列表，不包括当前视频
// const urls = urlList ? urlList.splice(urlList.findIndex((u) => url == u) + 1) : undefined
onMounted(() => {
  player.value = new Player({
    id: 'mse',
    url,
    autoplay: true,
    lang: 'zh-cn',
    fluid: true,
    poster: '/assets/poster.jpg',
    playbackRate: [1, 1.25, 1.5, 2],
    cssFullscreen: true,
    mini: false,
    airplay: true,
    playsinline: true,
    volume: storage.get('video_volume'),
    defaultPlaybackRate: storage.get('playbackrateChange', 1),
  })

  //更改播放速度
  player.value.on(Events.RATE_CHANGE, function (v: any) {
    const rate = player.value?.playbackRate
    storage.set('playbackrateChange', rate)
  })

  //声音大小缓存
  player.value.on(Events.VOLUME_CHANGE, function (v: any) {
    storage.set('video_volume', v.volume)
  })
})
defineExpose({
  player,
})
</script>

<template>
  <div id="mse" class="z-0"></div>
</template>
