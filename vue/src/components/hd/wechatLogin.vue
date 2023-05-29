<script setup lang="ts">
import { Wechat } from '@icon-park/vue-next'
const { isWechat } = useUtil()
const { scanLogin, scanLoginQr, qr } = useWechatLogin()
const showDialog = ref(false)

const loadQr = async () => {
  await scanLoginQr()
  showDialog.value = true
}
const time = setInterval(() => scanLogin(), 3000)
onBeforeRouteLeave(() => {
  clearInterval(time)
})
</script>

<template>
  <main>
    <a
      class="bg-green-700 rounded-full w-8 h-8 cursor-pointer flex justify-center items-center mt-3"
      v-if="isWechat()"
      href="/wechat/appLogin">
      <wechat theme="outline" size="24" class="text-white" />
    </a>
    <section v-else>
      <el-dialog v-model="showDialog" class="wechat-login-dialog" append-to-body>
        <div class="hidden md:flex flex-col">
          <el-image
            :src="`/api/wechat/scanLoginQrImage/${qr.ticket}`"
            @click="loadQr"
            fit="fill"
            :lazy="true"
            class="border rounded-md cursor-pointer" />
          <div class="text-center p-2 text-green-700">请使用微信扫码</div>
          <div class="text-center text-gray-600">二维码失效时，请点击刷新</div>
        </div>
        <div class="flex flex-col md:hidden">
          <h2 class="font-bold">温馨提示</h2>
          <p>手机端请关注公众号【后盾云】，使用微信登录学习</p>
        </div>
      </el-dialog>
      <div class="bg-green-700 rounded-full w-8 h-8 cursor-pointer flex justify-center items-center" @click="loadQr">
        <wechat theme="outline" size="24" class="text-white" />
      </div>
    </section>
  </main>
</template>

<style lang="scss">
.wechat-login-dialog {
  width: 350px !important;
}
</style>
