<script setup lang="ts">
const { getAll, collection } = useSoft()

await getAll()
</script>

<template>
  <main v-if="collection">
    <div class="flex flex-col justify-center items-center mt-16 px-5">
      <img src="/images/xj.jpg" alt="hdcms" class="rounded-full object-cover w-48 h-48 shadow-inner" />
      <h1 class="text-5xl xl:text-8xl font-extrabold mt-6 text-transparent bg-clip-text">向军大叔作品</h1>
      <!-- <p class="text-gray-500 mt-5 text-xl xl:text-xl font-extralight">抖音与B站搜索【后盾人】晚八点直播</p> -->
      <p class="text-gray-500 mt-5 font-extralight flex justify-center flex-col items-center">
        <div class="font-extralight text-lg">
            软件是视频教程的案例，
        <router-link :to="{ name: 'subscribe' }" class="font-extrabold text-green-600">订阅用户(不限类型)</router-link>
        均只提供<span class="font-bold">一年</span>学习使用
        </div>
        <div class="text-sm bg-slate-500 opacity-50 mt-2 text-white px-3 py-1 rounded-md">由于操作系统五花八门，所以不保证能够正常运行</div>
      </p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-20">
      <SoftItem :soft="soft" v-for="soft of collection" :show-button="false" />
    </div>
  </main>
</template>
<style scoped lang="scss">
h1 {
  animation: TitleAnimate 4s ease infinite;
  background-size: 500%;
  @apply bg-gradient-to-r from-yellow-600 to-red-600;
}
@keyframes TitleAnimate {
  0%,
  100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}
</style>
