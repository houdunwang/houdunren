<script setup lang="ts">
import router from '@/plugins/router'
import _ from 'lodash'
import Player, { Events } from 'xgplayer'
import 'xgplayer/dist/index.min.css'
const storage = useStorage()
const props = defineProps<{
  video: VideoModel
  videos: VideoModel[]
}>()

const player = ref<Player>()
//视频列表，不包括当前视频

const initPlayer = () => {
  const videoList = _.cloneDeep(props.videos).splice(props.videos.findIndex((v) => v.id == props.video.id) + 1)
  player.value = new Player({
    id: 'mse',
    url: props.video.path_cdn,
    playNext: {
      urlList: videoList.map((v) => v.path_cdn),
    },
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

  player.value.on(Events.PLAYNEXT, function (index: any) {
    router.push({ name: 'video.show', params: { id: videoList[index - 1].id } })
  })
}
onMounted(() => {
  initPlayer()
})

onUnmounted(() => {
  player.value?.destroy()
})
</script>

<template>
  <div id="mse" class="z-0"></div>
</template>
