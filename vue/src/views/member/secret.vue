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
      <el-tab-pane label="学习口令" name="subscribe" class="opacity-90 text-sm">
        <div class="bg-gray-200 px-2 py-2 mb-2 text-gray-700 rounded-md text-sm opacity-60 font-mono font-normal">
          软件是课程的案例不单独售卖，免费提供给订阅用户学习使用 <br />
          订阅用户(与订阅时长无关)免费赠送一年用于编程学习使用 <br />
          由于操作系统五花八门，且软件是免费赠送，所以不保证能够正常运行 <br />
          因为是免费赠送学习使用，网站保留调整或关闭软件的权力 <br />
          <!-- 其他用户也可以下载使用，除有些功能提供给订阅用户外 -->
        </div>
        <section class="text-gray-600 border p-3 rounded-md bg-slate-100 flex flex-col items-start">
          <div class="">
            学习口令 :
            <span class="text-orange-600 font-bold">
              {{ softSecret?.secret ?? '无' }}
            </span>
            <!-- 至 {{ dayjs(softSecret?.end_time).format('YYYY-MM-DD') }} -->
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
