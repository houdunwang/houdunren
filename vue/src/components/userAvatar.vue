<script setup lang="ts">
import { RouteLocationRaw } from 'vue-router'
const { user } = defineProps<{ user: UserModel }>()

const errorAvatar = () => {
  return new URL(`../../public/avatar/${user.sex == 1 ? 'boy' : 'girl'}.jpeg`, import.meta.url).href
}
</script>

<template>
  <router-link :to="{ name: 'sign.space', query: { uid: user.id } }" class="flex items-center">
    <el-image
      :src="user.avatar"
      fit="cover"
      :lazy="true"
      class="w-10 h-10 rounded-md cursor-pointer flex-shrink-0"
      v-bind="$attrs">
      <template #error>
        <img :src="errorAvatar()" />
      </template>
    </el-image>
  </router-link>
</template>
