<template>
  <div class="video" v-if="show">
    <div class="play">
      <video
        :src="path"
        autoplay="autoplay" controls="controls"
        poster="http://www.houdunwang.com/theme/houdunwang//images/poster.jpg"></video>
      <div class="close-video" @click="$emit('close')">
        <i class="fa fa-window-close" aria-hidden="true"></i>
      </div>
    </div>
    <div class="bg"></div>
  </div>
</template>

<script>
  import 'video.js';

  export default {
    props: ['path', 'close'],
    data() {
      return {
        show: true
      }
    },
    methods: {
    }
  }
</script>

<style lang="scss" scoped>
  .video {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999;
    @media screen and (max-width: 768px) {
      .play {
        width: 100%;
      }
    }
    @media screen and (min-width: 768px) {
      .play {
        width: 800px;
      }
    }

    .play {
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      position: relative;
      z-index: 99;

      video {
        width: 100%;
      }

      .close-video {
        z-index: 3;
        position: absolute;
        right: .3em;
        top: .3em;
        line-height: 0;
        color: #fff;
        font-size: 3em;

        &:hover {
          cursor: pointer;
        }
      }
    }

    .bg {
      background: #000;
      position: absolute;
      left: 0;
      right: 0;
      margin: 0;
      top: 0;
      opacity: .8;
      height: 100vh;
      width: 100vw;
    }
  }
</style>
