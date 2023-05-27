<script setup lang="ts">
const { config } = useConfigStore()
</script>

<template>
  <main v-if="config">
    <div class="px-3 md:px-0" v-if="config!.base.footerXjAvatar">
      <div class="el-divider el-divider--horizontal">
        <div
          class="el-divider__text is-center rounded-lg bg-gradient-to-r from-sky-500 to-indigo-500 text-white py-1 opacity-100">
          {{ config.copyright.ad }}
        </div>
      </div>
      <div class="flex flex-col items-center justify-center pt-10 mb-5">
        <img src="/images/xj.jpg" class="h-32 rounded-lg object-cover" />
        <div class="text-center mt-3 text-base font-bold">
          <span class="opacity-90 mr-2">本站编码</span>
          <router-link :to="{ name: 'live' }" class="text-[#ff7675] font-bold">向军大叔</router-link>
          <br />
          <button
            class="el-button el-button--success mt-3 flex items-center"
            type="button"
            @click="$router.push({ name: 'live' })">
            <span><i class="fas fa-play-circle"></i> 晚八点直播，来直播间聊天吧 </span>
          </button>
        </div>
      </div>
    </div>

    <div
      class="text-center text-sm py-10 px-3 md:px-0 leading-9 font-normal text-white relative overflow-hidden border-t-4 border-gray-800 bg-[#252931]"
      id="footer">
      <div>{{ config.copyright.ad }}</div>
      <div class="text-center">
        <div class="text-sm">
          <span class="pr-2"> 微信: {{ config.copyright.weixin }} </span>
          <span class="pr-2"> 邮箱：{{ config.copyright.email }}</span>
        </div>
        <div>{{ config.copyright.other }}</div>
        <a href="https://beian.miit.gov.cn/" target="_blank" class="text-gray-100">
          ICP证: {{ config.copyright.icp }}
        </a>
      </div>
    </div>
  </main>
</template>
