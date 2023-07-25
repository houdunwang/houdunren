<script setup lang="ts">
const { getAll, collection } = useSoft()
const { open } = useUtil()
await getAll()
</script>

<template>
  <main v-if="collection">
    <div class="flex flex-col justify-center items-center mt-16 px-5">
      <img src="/images/xj.jpg" alt="hdcms" class="rounded-full object-cover w-48 h-48 shadow-inner" />
      <h1 class="text-5xl xl:text-8xl font-extrabold mt-6 text-transparent bg-clip-text">向军大叔作品</h1>
      <div class="font-extralight text-lg items-center flex mt-3">
        <!-- 软件免费赠送<router-link :to="{ name: 'subscribe' }" class="text-green-600">订阅用户</router-link>学习使用 -->
      </div>
      <!-- <p class="text-gray-500 mt-5 text-xl xl:text-xl font-extralight">
        软件是视频教程的案例，免费提供给<router-link :to="{ name: 'subscribe' }" class="text-green-600" target="_blank">
          订阅用户 </router-link
        >学习使用，网站保留随时下架软件的权利
      </p> -->

      <!-- <p class="text-gray-500 mt-5 text-xl xl:text-xl font-extralight">抖音或B站搜索【后盾人】向军大叔晚八点直播</p> -->
      <!-- <div class="text-gray-500 mt-5 font-extralight flex justify-center flex-col items-center">
        <div class="font-extralight text-lg flex flex-col items-center">
          <div class="font-mono font-medium">
            <router-link :to="{ name: 'subscribe' }" class="text-green-600">订阅用户(与订阅时长无关)</router-link>
            <span>免费送一年</span>用于编程学习使用
          </div>
          <span class="font-light text-base mt-1 text-gray-800 font-mono">
            软件是课程的案例不单独售卖，免费提供给订阅用户学习使用
          </span>
        </div>
      </div> -->
      <!-- <div class="">
        <el-button
          type="primary"
          size="default"
          class="mt-3"
          @click="
            open(
              'https://doc.houdunren.com/%E5%90%8E%E7%9B%BE%E4%BA%BA%E8%BD%AF%E4%BB%B6/%E5%B8%B8%E8%A7%81%E9%97%AE%E9%A2%98.html',
              '_blank',
            )
          ">
          常见问题
        </el-button>
        <el-button type="success" size="default" class="mt-3" @click="open({ name: 'member.secret' }, '_blank')">
          查看密钥
        </el-button>
      </div> -->
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
