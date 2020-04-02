<template>
  <div>
    <video-player
      class="video-player-box"
      ref="videoPlayer"
      :options="playerOptions"
      :playsinline="true"
      customEventName="customstatechangedeventname"
      @play="onPlayerPlay($event)"
      @statechanged="playerStateChanged($event)"
    ></video-player>

    <div class="text-white" hidden alt="目的是触发组件动态改变">{{ this.path }}</div>
  </div>
</template>

<script>
import 'video.js/dist/video-js.css'
import { videoPlayer } from 'vue-video-player'
export default {
  props: ['path'],
  components: {
    videoPlayer
  },
  data() {
    return {
      playerOptions: {
        language: 'zh',
        //播放速度
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            type: 'video/mp4',
            src: this.path
          }
        ]
        // poster: '/static/images/author.jpg'
      }
    }
  },
  beforeUpdate() {
    //需要在页面中添加一个元素，使用组件发生改变
    this.playerOptions.sources[0].src = this.path
  },
  computed: {
    player() {
      return this.$refs.videoPlayer.player
    }
  },
  methods: {
    onPlayerPlay(player) {
      // console.log('player play!', player)
    }
  }
}
</script>

<style lang="scss" scope>
.video-js {
  width: 100%;
  height: auto !important;
  position: relative;
  background: none !important;
  line-height: 0;
  video {
    position: relative !important;
  }
  .vjs-big-play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
}
</style>
