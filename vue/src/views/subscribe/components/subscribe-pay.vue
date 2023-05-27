<script setup lang="ts">
import PayButton from './pay-button.vue'
const { config } = useConfigStore()
</script>

<template>
  <main class="justify-center -mt-1" v-if="config">
    <div class="bg h-[500px] py-10 box-content shadow-2xl flex flex-col">
      <h1 class="text-center p-10 mt-10 text-5xl md:text-8xl font-semibold text-white">投资学习是值得的</h1>
      <h2 class="text-center text-white opacity-80 font-light text-2xl">
        订阅后可以观看网站所有教程，并支持高清版下载
      </h2>
    </div>
    <section class="justify-center flex flex-col lg:flex-row gap-3 -mt-52">
      <div
        class="rounded-lg bg-white px-8 py-16 lg:w-[500px] mx-3 flex flex-col items-center justify-center shadow-inner">
        <h2 class="font-bold text-gray-800 text-2xl py-6 flex flex-col items-center gap-1">
          <icon-rocket-one theme="outline" size="100" :strokeWidth="3" fill="#e74c3c" />
          <span class="text-gray-800">订阅一年</span>
        </h2>
        <p class="text-lg">一年学习所有视频</p>
        <div class="price text-4xl font-bold py-5">{{ config.subscribe.price_year }}元</div>
        <div class="flex">
          <PayButton :price="config.subscribe.price_year" />
        </div>
      </div>
      <div
        class="rounded-lg px-8 py-16 lg:w-[500px] mx-3 flex flex-col items-center justify-center bg-[#ED4891] bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 shadow-inner">
        <h2 class="font-bold text-white text-2xl py-6 flex flex-col items-center gap-1">
          <icon-diamond theme="filled" size="100" :strokeWidth="3" fill="#fff" />
          <span class="text-[#fff]">钻石帐号</span>
        </h2>
        <p class="text-white">永久学习所有课程</p>
        <div class="price text-4xl font-bold py-5 text-white">{{ config.subscribe.price_permanent }}元</div>
        <div class="flex">
          <PayButton :price="config.subscribe.price_permanent" class="text-white" />
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.bg {
  background: linear-gradient(150deg, #2d1582, #19a0ff);
}
</style>
