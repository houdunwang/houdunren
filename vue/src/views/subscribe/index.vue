<script setup lang="ts">
const { getAll, collection, destroy } = usePackage()
await getAll()
console.log(navigator.userAgent)
</script>

<template>
  <main class="!-mt-0 !w-full !p-0" v-if="collection.length">
    <main class="justify-center -mt-1">
      <div class="bg h-[400px] xl:h-[500px] lg:py-10 box-content shadow-2xl flex flex-col">
        <h1 class="text-center p-10 xl:mt-10 text-4xl md:text-6xl lg:text-8xl font-semibold text-white">
          投资学习是值得的
        </h1>
        <h2 class="text-center text-white opacity-80 font-light text-base md:text-xl lg:text-2xl">
          订阅期内可以观看所有教程，提供高清版视频下载 <br />
        </h2>
        <div class="text-base font-thin text-center text-white opacity-80 mt-2 font-sans lg:text-2xl">
          免费提供
          <router-link
            :to="{ name: 'soft.index' }"
            class="text-yellow-100 hover:text-yellow-300 font-normal"
            target="_blank">
            教程案例
          </router-link>
          下载学习使用
        </div>
      </div>
      <section class="flex flex-col md:flex-row justify-center gap-5 -mt-52 px-3">
        <PackageItem
          v-for="item of collection"
          :key="item.id"
          :item="item"
          @del="destroy"
          class="2xl:px-20"
          v-show="item.state" />
      </section>
    </main>
    <h2 class="text-center text-gray-600 text-lg mt-8 px-5">随着课程不断增加，订阅价格会有涨幅，越早订阅越划算</h2>
    <div class="py-5 px-5 text-center text-sm text-gray-700 md:w-3/4 m-auto leading-8 opacity-90 font-light">
      视频属于虚拟物品，购买后不支持退款，支付的费用仅用于观看视频，并不包含其他服务（如在线解答）
      <br />
      有问题发到网站，热心的盾友会帮助你的，也可以加入微信群与志同道合的兄弟姐妹交流
      <br />
      祝你学有所成，加油少年！
    </div>
  </main>
</template>

<style lang="scss" scoped>
.bg {
  background: linear-gradient(150deg, #2d1582, #19a0ff);
}
</style>
