<script setup lang="ts">
import dayjs from 'dayjs'

const tab = ref('subscribe')
const { getSubscribeInfo } = useSubscribe()
const subscribe = await getSubscribeInfo()
const userStore = useUserStore()
const { refreshSecret } = useSoftSecret()
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="会员周期" name="subscribe" class="opacity-90 text-sm">
        <section class="text-gray-600 border p-3 rounded-md mb-3 bg-gray-100">
          <div v-if="subscribe.end_time" class="flex items-center">
            <section v-if="dayjs(subscribe.end_time).diff(dayjs(), 'year') > 20">
              你是<span class="text-green-600 font-bold mx-2">永久钻石</span> 帐号，可以无限期观看网站所有视频
            </section>
            <section v-else>
              你的订阅将在
              <span class="text-green-600 font-bold mx-2">{{ dayjs(subscribe.end_time).format('YYYY-MM-DD') }}</span>
              到期。
            </section>
          </div>
          <div v-else>
            <el-button type="danger" size="default" @click="$router.push({ name: 'subscribe' })">
              订阅会员 / 学习网站所有课程
            </el-button>
          </div>
        </section>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
