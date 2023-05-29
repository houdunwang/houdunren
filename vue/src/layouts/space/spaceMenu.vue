<script setup lang="ts">
import UserIcon from '@/components/user-icon.vue'
import dayjs from 'dayjs'
const route = useRoute()
const { findOne, model: user } = useUser()
findOne(route.query.uid)
</script>

<template>
  <main v-if="user">
    <section class="-mt-1 relative bg-gradient-to-bl from-[#474794] to-[#36368e] py-8 pb-12 text-white shadow-2xl]">
      <div
        :style="`background:url(${user.avatar});background-size: cover;filter:blur(10px)`"
        class="absolute top-0 left-0 right-0 bottom-0 z-0"></div>
      <div class="2xl:w-page m-auto">
        <div class="font-bold text-5xl flex items-center justify-center text-center">
          <UserAvatar :user="user" fit="cover" class="w-52 h-52 !rounded-full shadow-3xl" />
          <!-- <el-image :src="user.avatar" fit="cover" class="w-52 h-52 rounded-full shadow-3xl" /> -->
        </div>
        <div class="flex flex-col items-center text-2xl mt-3 text-white opacity-80">
          <div class="mb-2">{{ user.nickname }}</div>
          <div class="text-sm flex flex-col items-center">
            <div class="flex items-center">
              <icon-time theme="outline" class="mr-1" /> 注册于 {{ dayjs(user.created_at).fromNow() }}
            </div>
            <UserIcon :user="user" />
          </div>
        </div>
      </div>
    </section>

    <section class="2xl:w-page mx-auto relative z-10">
      <nav class="flex justify-center flex-wrap">
        <router-link
          :to="{ name: 'topic.space', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string)=='topic.space'}">
          TA的贴子
        </router-link>
        <router-link
          :to="{ name: 'sign.space', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string).includes('sign') }">
          历史签到
        </router-link>
        <router-link
          :to="{ name: 'video.space', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string) =='video.space' }">
          最近学习
        </router-link>
        <router-link
          :to="{ name: 'lesson.space.favorite', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string) == 'lesson.space.favorite' }">
          课程收藏
        </router-link>
        <router-link
          :to="{ name: 'video.space.favorite', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string) =='video.space.favorite' }">
          视频收藏
        </router-link>
        <router-link
          :to="{ name: 'topic.space.favorite', query: { uid: $route.query?.uid } }"
          :class="{ active: ($route.name as string)=='topic.space.favorite' }">
          贴子收藏
        </router-link>
      </nav>
    </section>
  </main>
</template>

<style lang="scss" scoped>
nav {
  @apply -mt-12 p-5 flex gap-2;
  a {
    @apply bg-gray-800 rounded-md py-2 px-5 text-white hover:bg-orange-500 duration-300 shadow-2xl;
    &.active {
      @apply bg-orange-500;
    }
  }
}
</style>
