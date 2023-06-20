<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <router-link
    :to="{ name: 'sign.space', query: { uid: user.id } }"
    class="flex items-center overflow-hidden group rounded-md">
    <el-image
      :src="user.avatar"
      fit="cover"
      :lazy="true"
      class="w-10 h-10 cursor-pointer flex-shrink-0 group-hover:scale-125 object-cover overflow-hidden duration-500"
      v-bind="$attrs">
      <template #error>
        <img :src="user.sex == 1 ? '/assets/avatar/boy.jpeg' : '/assets/avatar/girl.jpeg'" />
      </template>
    </el-image>
  </router-link>
</template>
