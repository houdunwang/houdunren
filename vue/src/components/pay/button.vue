<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'
const { packageItem } = defineProps<{
  packageItem: PackageModel
}>()
const { wechatNativePay, wepayQr, wechatMpPay, alipay } = usePay()
const { isWechat } = useUtil()
const showWepayDialog = ref(false)

const wechatNative = async () => {
  await wechatNativePay(packageItem)
  showWepayDialog.value = true
}
</script>

<template>
  <div class="flex justify-center gap-3 mt-5">
    <div v-if="isWechat()">
      <button
        @click="wechatMpPay(packageItem)"
        v-if="isWechat()"
        class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-8 py-3 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline text-2xl">
        微信支付
      </button>
    </div>
    <div v-else>
      <div class="hidden md:block">
        <button
          type="button"
          @click="alipay(packageItem)"
          class="border border-green-500 bg-green-500 text-white rounded-md px-5 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline text-base">
          支付宝付款
        </button>
        <button
          type="button"
          @click="wechatNative"
          class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-5 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline text-base">
          微信支付
        </button>
      </div>
      <span class="md:hidden text-lg font-light" v-bind="$attrs">
        请在<span class="font-bold">电脑端</span>或<span class="font-bold">后盾云</span>公众号购买
      </span>
    </div>
    <el-dialog title="" v-model="showWepayDialog" width="400px" :append-to-body="true">
      <div class="flex flex-col items-center justify-center rounded-lg">
        <el-image :src="wepayQr" fit="fill" :lazy="true" class="w-full" />
        <div class="text-base font-bold">支付完成点击下面按钮查看订阅状态</div>
        <a
          href="/member/subscribe"
          class="bg-green-600 hover:text-white hover:bg-green-500 rounded-md flex justify-center items-center py-2 px-5 mt-3 text-white">
          查看订单信息
        </a>
      </div>
    </el-dialog>
  </div>
</template>
