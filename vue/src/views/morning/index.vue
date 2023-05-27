<script setup lang="ts">
import MorningSubmit from './components/morning-submit.vue'
import MorningList from './components/morning-list.vue'
import MorningSigns from './components/morning-signs.vue'
import Warning from './components/warning.vue'
const wechatInput = new URL(`../../../public/wechat/input.jpg`, import.meta.url).href
</script>

<template>
  <main>
    <div class="grid md:grid-cols-2 gap-5">
      <MorningSubmit />
      <div class="">
        <MorningSigns />
        <Warning class="mt-3" />
        <HdCard class="mt-3">
          <template #header> 微信快签 </template>
          <div class="leading-8 text-base text-gray-600">
            使用微信签到更快，微信搜索 houdunren2022 关注【后盾云】公众号， 发送以『签到』开始的的内容。
            <div>
              <el-image :src="wechatInput" :lazy="true" class="w-auto h-20"></el-image>
            </div>
          </div>
        </HdCard>
      </div>
    </div>
    <MorningList />
  </main>
</template>
