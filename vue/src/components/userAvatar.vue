<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()

const errorAvatar = () => {
  return new URL(`../../public/avatar/${user.sex == 1 ? 'boy' : 'girl'}.jpeg`, import.meta.url).href
}
</script>

<template>
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
</template>
