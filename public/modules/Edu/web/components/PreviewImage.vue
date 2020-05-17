<template>
  <div>
    <a-modal v-model="preview.show" :closable="false" :footer="null" :width="preview.width">
      <div class="topic-preview-image">
        <img :src="preview.img" />
      </div>
    </a-modal>
  </div>
</template>

<script>
export default {
  props: {
    el: String
  },
  data() {
    return {
      preview: {
        show: false,
        img: '',
        width: '95%'
      }
    }
  },
  mounted() {
    this.previewImg()
  },
  methods: {
    previewImg() {
      setTimeout(() => {
        document
          .querySelector(this.el)
          .querySelectorAll('img')
          .forEach(img => {
            img.addEventListener('click', () => {
              if (document.documentElement.clientWidth > 800) {
                this.preview.width = Math.min(img.naturalWidth, document.documentElement.clientWidth * 0.8)
              }
              if (img.naturalWidth > img.width) {
                this.preview.show = true
                this.preview.img = img.currentSrc
              }
            })
          })
      }, 1000)
    }
  }
}
</script>

<style scoped lang="scss">
.topic-preview-image {
  display: flex;
  justify-content: center;
  align-items: center;
  img {
    width: 100%;
  }
}
</style>
