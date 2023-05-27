<script setup lang="ts">
const channel = [
  { title: 'Bilibili', url: 'https://space.bilibili.com/282190994' },
  {
    title: '抖音',
    url: 'https://www.douyin.com/user/MS4wLjABAAAAz0TXiTnI3HAmxDEfBrHItlViAwC6rsxJL6_GIHFA2Ho',
  },
  { title: '西瓜视频', url: 'https://www.ixigua.com/home/94665151994/?list_entrance=search' },
  { title: '快手', url: 'https://www.kuaishou.com/profile/3xapd3e55b3saia' },
]
</script>

<template>
  <main>
    <HdCard>
      <template #header>
        <div class="flex items-center justify-between">
          <span class="">短视频</span>
          <span class="text-base font-light flex items-center gap-1">
            <icon-video-two theme="outline" size="24" class="text-green-700" />
            大叔的短视频，希望朋友们喜欢
          </span>
        </div>
      </template>
      <section class="grid grid-flow-col">
        <div class="" v-for="(item, index) of channel" :key="index">
          <a :href="item.url" class="text-lg font-bold" target="_blank">{{ item.title }}</a>
        </div>
      </section>
    </HdCard>
  </main>
</template>
