<script setup lang="ts">
defineEmits(['del'])
const { isAdministrator } = useUser()
const { del } = useShortVideo()

const { item } = defineProps<{
  item: ShortVideoModel
}>()
</script>

<template>
  <section
    class="border border-gray-200 rounded-lg bg-white overflow-hidden hover:scale-105 duration-500 hover:border-indigo-200 flex flex-col">
    <div class="">
      <router-link :to="{ name: 'shortvideo.show', params: { id: item.id } }" target="_blank">
        <el-image :src="item.preview" fit="cover" :lazy="true" />
      </router-link>
    </div>
    <div class="mt-3 flex flex-col justify-start">
      <router-link
        :to="{ name: 'shortvideo.show', params: { id: item.id } }"
        class="font-bold text-gray-700 mb-3 text-lg px-5 truncate hover:text-green-700"
        target="_blank">
        {{ item.title }}
      </router-link>
    </div>

    <div class="flex items-center justify-between gap-2 px-5 py-3 border-t" v-if="isAdministrator()">
      <router-link :to="{ name: 'shortvideo.edit', params: { id: item.id } }">
        <el-button type="success" size="small"> 编辑 </el-button>
      </router-link>
      <el-button type="danger" size="small" @click="del(item.id)">删除</el-button>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
