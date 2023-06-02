<script setup lang="ts">
import PayButton from './pay-button.vue'
const { config } = useConfigStore()
</script>

<template>
  <main class="justify-center -mt-1" v-if="config">
    <div class="bg h-[400px] xl:h-[500px] lg:py-10 box-content shadow-2xl flex flex-col">
      <h1 class="text-center p-10 xl:mt-10 text-4xl md:text-6xl lg:text-8xl font-semibold text-white">
        投资学习是值得的
      </h1>
      <h2 class="text-center text-white opacity-80 font-light text-base md:text-xl lg:text-2xl">
        订阅后可以观看所有教程，并支持高清版下载学习
      </h2>
    </div>
    <section class="flex flex-col md:flex-row justify-center gap-5 -mt-52 px-3">
      <div
        class="rounded-lg bg-white px-8 py-5 2xl:py-16 w-full lg:w-[500px] flex flex-col items-center justify-center shadow-inner">
        <h2
          class="font-bold text-gray-800 text-2xl py-6 flex flex-col items-center gap-1"
          v-if="config.subscribe.year.state">
          <div>
            <svg width="100" height="100" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M20.906 6.06267L22.3359 5.1094C23.3436 4.4376 24.6564 4.4376 25.6641 5.1094L27.094 6.06267C32.658 9.77199 36 16.0166 36 22.7037V33H12V22.7037C12 16.0166 15.342 9.77199 20.906 6.06267Z"
                stroke="#e25f01"
                stroke-width="4"
                stroke-linecap="round"
                stroke-linejoin="round" />
              <circle cx="24" cy="20" r="6" fill="#e25f01" stroke="#e25f01" stroke-width="4" />
              <path
                d="M12 22L6 28.2174V33H42V28.2174L36 22"
                stroke="#e25f01"
                stroke-width="4"
                stroke-linecap="round"
                stroke-linejoin="round" />
              <path d="M24 38V44" stroke="#e25f01" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16 40V42" stroke="#e25f01" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M32 40V42" stroke="#e25f01" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <!-- <icon-rocket-one theme="outline" size="100" :strokeWidth="3" fill="#e74c3c" /> -->
          <span class="text-gray-800">订阅一年</span>
        </h2>
        <p class="text-lg">一年学习所有视频</p>
        <div class="price text-4xl font-bold py-5">{{ config.subscribe.year.price }}元</div>
        <div class="opacity-80">
          原价: <span class="line-through">{{ config.subscribe.year.original }}</span>
        </div>
        <div class="flex">
          <PayButton :price="config.subscribe.year.price" />
        </div>
      </div>

      <div
        class="rounded-lg px-8 py-5 2xl:py-16 w-full lg:w-[500px] flex flex-col items-center justify-center bg-[#ED4891] bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 shadow-inner"
        :class="`text-white`"
        v-if="config.subscribe.permanent.state">
        <h2 class="font-bold text-2xl py-6 flex flex-col items-center gap-1">
          <icon-diamond theme="filled" size="100" :strokeWidth="3" fill="#fff" />
          <span>钻石帐号</span>
        </h2>
        <p>永久学习所有课程</p>
        <div class="price text-4xl font-bold py-5">{{ config.subscribe.permanent.price }}元</div>
        <div class="opacity-80">
          原价: <span class="line-through">{{ config.subscribe.permanent.original }}</span>
        </div>
        <div class="flex">
          <PayButton :price="config.subscribe.permanent.prive" class="text-white" />
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
