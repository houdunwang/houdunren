<script setup lang="ts">
const xjImg = new URL(`../../../public/images/xj.jpg`, import.meta.url).href
</script>

<template>
  <main class="relative !p-0 !m-0 !w-full">
    <section class="text-white overflow-hidden bg-[#2c3e50]">
      <div class="2xl:w-page 2xl:mx-auto flex flex-col items-center py-6 px-3">
        <img :src="xjImg" class="rounded-lg lg:h-36" />
        <div class="mt-5 text-lg opacity-80 text-center leading-loose">
          朋友们温暖的鼓励，让我坚持了十几年视频录制，人生很短，做不了太多事情，十年弹指一挥间<br />
          祝朋友们及家人、身体健康、快乐相伴，感恩朋友们的陪伴
        </div>
      </div>
    </section>
    <div class="bg-[#34495e] py-10">
      <div class="text-center mb-10">
        <el-button type="success" size="large" @click="$router.push({ name: 'shot.comment' })">温暖的评论</el-button>
        <el-button type="danger" size="large" @click="$router.push({ name: 'shot.live' })">直播互动</el-button>
      </div>
      <div class="w-page mx-auto">
        <slot />
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped></style>
