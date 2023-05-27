<script setup lang="ts">
const route = useRoute()
const { find, model } = useShortVideo()
await find(+route.params.id)
</script>

<template>
  <main v-if="model" class="!w-full !p-0 !-mt-0">
    <div class="bg-[#313848] -mt-1 relative" v-if="model.path">
      <HdVideoPlayer :url="model.path" ref="videoPlayer" class="2xl:w-page mx-auto xl:w-[1300px]" />
    </div>
    <SubscribePay v-else />
    <section class="2xl:w-page 2xl:mx-auto pt-3">
      <CommentList
        type="ShortVideo"
        :mid="model?.id!"
        :key="model.id"
        class="lg:col-span-8 2xl:col-span-8 rounded-xl lg:m-0 mt-3" />
    </section>
  </main>
</template>

<style lang="scss" scoped>
.bg {
  background: linear-gradient(150deg, #2d1582, #19a0ff);
}
</style>
