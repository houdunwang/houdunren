<script setup lang="ts">
const { bind, unbind, qr, getScanQr } = useWechatBind()
await getScanQr()
const userStore = useUserStore()

const time = setInterval(async () => {
  if (userStore.wechatIsBind) {
    clearInterval(time)
  } else {
    await bind()
  }
}, 3000)
onUnmounted(() => {
  console.log('onUnmounted')
  clearInterval(time)
})
</script>

<template>
  <main>
    <div class="flex flex-col items-start" v-if="userStore.wechatIsBind">
      <el-alert title="微信已经绑定" type="success" effect="light" show-icon :closable="false" />

      <el-button type="danger" size="default" @click="unbind" class="mt-3"> 解绑微信 </el-button>
    </div>
    <div v-else>
      <el-alert title="请用微信扫描下方二维码" type="success" effect="light" show-icon :closable="false" />

      <el-image
        v-if="qr"
        :src="`/api/wechat/scanLoginQrImage/${qr.ticket}`"
        @click="getScanQr"
        fit="fill"
        :lazy="true"
        class="border rounded-md cursor-pointer w-48 h-48 mt-2" />
      <HdError name="wechat" />
    </div>
  </main>
</template>
