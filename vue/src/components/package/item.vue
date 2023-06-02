<script setup lang="ts">
import PayButton from '@/components/pay/button.vue'

const { item, showButton = false } = defineProps<{
  item: PackageModel
  showButton?: boolean
}>()

const emit = defineEmits<{
  del: [id: number]
}>()
</script>

<template>
  <main class="rounded-lg overflow-hidden px-8 py-5 2xl:py-10 shadow-inner" :class="[item.text_color, item.bg_color]">
    <div class="flex flex-col items-center justify-center">
      <h2 class="font-bold text-2xl py-6 flex flex-col items-center gap-1">
        <el-image :src="item.icon" fit="fill" :lazy="true" class="w-28 h-28"></el-image>
        <span>{{ item.title }}</span>
      </h2>
      <p class="opacity-80">{{ item.ad }}</p>
      <div class="price text-4xl font-bold py-5">{{ +item.price }}元</div>
      <div class="opacity-70">
        原价: <span class="line-through">{{ +item.original_price }}</span>
      </div>
      <PayButton :price="item.price" />
    </div>
    <div class="flex justify-center mt-3" v-if="showButton">
      <el-button
        type="success"
        plain
        size="small"
        @click="$router.push({ name: 'package.edit', params: { id: item.id } })">
        编辑
      </el-button>
      <el-button type="danger" plain size="small" @click="emit('del', item.id)">删除</el-button>
    </div>
  </main>
</template>

<style lang="scss"></style>
