<script setup lang="ts">
import dayjs from 'dayjs'
const { open } = useUtil()
const tab = ref('subscribe')
const userStore = useUserStore()
const { refreshSecret } = useSoftSecret()
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="软件密钥" name="subscribe" class="opacity-90 text-sm">
        <div class="bg-slate-400 px-2 py-1 mb-2 text-white rounded-sm text-sm">
          订阅用户<span>(与订阅时长无关)</span> ，赠送一年的软件密钥，用于编程学习使用
        </div>
        <section class="text-gray-600 border p-3 rounded-md bg-slate-100 flex flex-col items-start">
          <div class="">
            软件密钥 :
            <span class="text-orange-600 font-bold">{{ userStore.user?.soft_secret?.secret ?? '未订阅，无密钥' }}</span>
          </div>
          <div class="" v-if="userStore.user?.soft_secret">
            到期时间 : {{ dayjs(userStore.user?.soft_secret?.end_time).format('YYYY-MM-DD') }}
          </div>
          <div class="">
            <el-button
              type="primary"
              size="small"
              @click="refreshSecret"
              class="mt-3"
              v-if="userStore.user?.soft_secret">
              刷新密钥
            </el-button>
            <el-button type="success" size="small" @click="open({ name: 'soft.index' }, '_blank')" class="mt-3">
              查看软件
            </el-button>
          </div>
        </section>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
