<script setup lang="ts">
import dayjs from 'dayjs'

const tab = ref('duration')
const { duration, get } = useDuration()
await get()
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="会员周期" name="duration">
        <div class="text-gray-600 border p-5 rounded-md flex items-center" v-if="duration?.id">
          <section v-if="dayjs(duration?.end_time).diff(dayjs(), 'year') > 50">
            你是永久钻石帐号，可以无限期观看网站所有视频
          </section>
          <section v-else>
            你的会员将在
            <span class="text-green-600 font-bold mx-2">{{ dayjs(duration?.end_time).format('YYYY-MM-DD') }}</span>
            到期。
          </section>
          <div v-if="duration.months">
            你获得了 <span class="text-red-600 font-bold mx-2">{{ duration.months }}</span> 个月的延时
          </div>
        </div>
        <div v-else>
          <el-button type="danger" size="default" @click="$router.push({ name: 'subscribe' })">
            订阅会员 / 学习网站所有课程
          </el-button>
        </div>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>

<style lang="scss"></style>
