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
  <main class="rounded-lg overflow-hidden px-8 py-5 2xl:py-10 shadow-inner" :style="item.style">
    <div class="flex flex-col items-center justify-center">
      <el-image :src="item.icon" fit="fill" :lazy="true" class="w-28 h-28"></el-image>
      <h2 class="font-bold text-2xl mb-2">{{ item.title }}</h2>
      <p class="opacity-80">{{ item.ad }}</p>
      <div class="price text-4xl font-bold mt-8">{{ +item.price }}元</div>
      <!-- <div class="opacity-70 mt-2">
        原价: <span class="line-through">{{ +item.original_price }}</span>
      </div> -->
      <PayButton :price="item.price" :package-item="item" />
    </div>
    <div class="flex justify-center mt-5" v-if="showButton">
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
