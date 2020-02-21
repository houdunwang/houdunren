<template>
  <div v-if="show">
    <div class="play" @click="$emit('close')">
      <div class="content">
        <video
          id="video"
          :src="path"
          class="shadow-lg"
          autoplay="autoplay"
          controls="controls"
          poster="http://www.houdunwang.com/theme/houdunwang//images/poster.jpg"
          webkit-playsinline="true" playsinline="true"
          x5-playsinline="true"
        ></video>
        <div class="close-video" @click="$emit('close')">
          <i class="fa fa-window-close" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <div class="bg" @click="$emit('close')"></div>
  </div>
</template>

<script>
  import 'video.js';

  export default {
    props: ['path', 'close'],
    data() {
      return {
        show: true,
        video: ''
      }
    },
    mounted() {
      // document.querySelector('.play').addEventListener('click', () => {
      //   this.$emit('close');
      // })
    }
  }
</script>

<style lang="scss" scoped>
  .play {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;
    @media screen and (max-width: 768px) {
      .content {
        width: 100%;

        .close-video {
          display: none;
        }
      }
    }
    @media screen and (min-width: 768px) {
      .content {
        width: 600px;
      }
    }

    .content {
      display: flex;
      justify-content: center;
      align-items: flex-start;

      video {
        width: 100%;
        /*object-fit: fill;*/
        border: solid 1px #2c3e50;
        z-index: 1;
      }
    }

    .close-video {
      z-index: 9999;
      color: #666;
      font-size: 1.5em;
      line-height: 0;
      position: relative;
      right: 1.2em;
      top: .2em;

      &:hover {
        cursor: pointer;
      }
    }
  }

  .bg {
    position: fixed;
    z-index: 10;
    background: #000;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    opacity: .3;
  }
</style>
