<script setup lang="ts">
import gsap from 'gsap'
import { RendererElement } from 'vue'

interface props {
  tag?: string
  duration?: number
  delay?: number
}

const props = withDefaults(defineProps<props>(), {
  tag: undefined,
  duration: 0.5,
  delay: 0.2,
})

const beforeEnter = (el: RendererElement) => {
  gsap.set(el, {
    opacity: 0,
  })
}

const enter = (el: RendererElement) => {
  gsap.to(el, {
    opacity: 1,
    duration: props.duration,
    delay: el.dataset.index * props.delay ?? 0,
  })
}
</script>

<template>
  <div class="animate-list">
    <TransitionGroup :tag="props.tag" appear name="animate" @before-enter="beforeEnter" @enter="enter">
      <slot />
    </TransitionGroup>
  </div>
</template>

<style lang="scss" scoped>
.animate-list {
  position: relative;
  .animate-leave-active {
    transition: all 1s ease;
    position: absolute;
    width: 100%;
  }
  .animate-leave-to {
    opacity: 0;
  }
  .animate-move {
    transition: all 1s ease;
  }
}
</style>
