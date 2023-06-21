<script setup lang="ts">
import dayjs from 'dayjs'
const { open } = useUtil()
const tab = ref('subscribe')
const { refreshSecret, getSoftSecret, softSecret } = useSoftSecret()
await getSoftSecret()
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="软件密钥" name="subscribe" class="opacity-90 text-sm">
        <div class="bg-slate-400 px-2 py-1 mb-2 text-white rounded-sm text-sm">
          订阅用户<span>(与订阅时长无关)</span> <span class="font-bold">免费赠送一年</span>用于编程学习使用
          <div>由于操作系统五花八门，且软件是免费赠送，所以不保证能够正常运行</div>
        </div>
        <section class="text-gray-600 border p-3 rounded-md bg-slate-100 flex flex-col items-start">
          <div class="">
            软件密钥 :
            <span class="text-orange-600 font-bold">{{ softSecret?.secret ?? '无密钥' }}</span>
          </div>
          <div class="" v-if="softSecret">到期时间 : {{ dayjs(softSecret?.end_time).format('YYYY-MM-DD') }}</div>
          <div class="">
            <el-button type="primary" size="small" @click="refreshSecret" class="mt-3"> 刷新密钥 </el-button>
            <el-button type="success" size="small" @click="open({ name: 'soft.index' }, '_blank')" class="mt-3">
              查看软件
            </el-button>
          </div>
        </section>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
