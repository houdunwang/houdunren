<script setup lang="ts">
import { ref, nextTick } from 'vue'
import * as echarts from 'echarts'
import { echart1, echart2 } from './echart'

interface ICard {
  title: string
  price: number
  icon: string
  iconColor: string
  totalTitle: string
  total: number
}
const cards = ref<ICard[]>([
  {
    title: '总人数',
    price: 23343,
    iconColor: 'text-violet-500',
    icon: 'fas fa-address-card',
    total: 982,
    totalTitle: '总人数',
  },
  {
    title: '销售额',
    price: 18393,
    iconColor: 'text-green-600',
    icon: 'fas fa-apple-alt',
    total: 8267,
    totalTitle: '总销11售额',
  },
  //   {
  //     title: '订单量',
  //     price: 203,
  //     iconColor: 'text-blue-500',
  //     icon: 'fas fa-award',
  //     total: 693,
  //     totalTitle: '总订单数',
  //   },
  {
    title: '评论数',
    price: 194,
    iconColor: 'text-red-500',
    icon: 'fas fa-baseball-ball',
    total: 189,
    totalTitle: '总评论',
  },
])

nextTick(() => {
  echarts.init(document.getElementById('echart1') as HTMLDivElement).setOption(echart1)
  echarts.init(document.getElementById('echart2') as HTMLDivElement).setOption(echart2)
  //   echarts.init(document.getElementById('echart3') as HTMLDivElement).setOption(echart3)
  //   echarts.init(document.getElementById('echart4') as HTMLDivElement).setOption(echart4)
})
</script>

<template>
  <div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 bg-gray-100">
      <el-card
        shadow="hover"
        :body-style="{ padding: '20px' }"
        v-for="(card, index) of cards"
        :key="index"
        class="cursor-pointer">
        <template #header>
          <div class="flex justify-between items-center">
            {{ card.title }}
            <el-tag type="danger" size="small" effect="dark">月</el-tag>
          </div>
        </template>

        <section class="flex mt-3 justify-between items-center">
          <span class="text-3xl">{{ card.total }}</span>
          <i :class="[card.icon, card.iconColor]" class="text-5xl"></i>
        </section>
        <section class="text-base mt-6 flex justify-between">
          {{ card.totalTitle }}
          <span class>{{ card.total }}</span>
        </section>
      </el-card>
    </div>

    <div class="mt-5 grid grid-cols-1 lg:grid-cols-2 gap-3">
      <el-card shadow="hover" :body-style="{ padding: '20px' }">
        <template #header> 用户统计 </template>
        <div id="echart1" class="h-72"></div>
      </el-card>
      <el-card shadow="hover" :body-style="{ padding: '20px' }">
        <template #header> 销售额 </template>
        <div id="echart2" class="h-72"></div>
      </el-card>
      <!-- <el-card shadow="hover" :body-style="{ padding: '20px' }">
        <template #header> 搜索来源 </template>
        <div id="echart3" class="h-72"></div>
      </el-card>
      <el-card shadow="hover" :body-style="{ padding: '20px' }">
        <template #header> 订单分析 </template>
        <div id="echart4" class="h-72"></div>
      </el-card> -->
    </div>
  </div>
</template>

<style lang="scss"></style>
