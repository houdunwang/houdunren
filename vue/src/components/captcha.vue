<script setup lang="ts">
import { http } from '@/plugins/axios'
import errorStore from '@/store/useErrorStore'
defineProps<{ captcha: string; captcha_key: string }>()
const emit = defineEmits(['update:captcha', 'update:captcha_key'])
interface ICaptcha {
  key: string
  img: string
}
const captcha = ref<ICaptcha>({ key: '', img: '' })

const get = async () => {
  captcha.value = await http.request<ICaptcha>(
    {
      baseURL: '',
      url: `/captcha/api/math`,
    },
    { loading: false, clearValidateError: false },
  )
}

await get()
const form = reactive({ code: '' })
const emitEvent = () => {
  emit('update:captcha', form.code)
  emit('update:captcha_key', captcha.value.key)
}

defineExpose({ get })
</script>

<template>
  <main>
    <div class="gap-2 flex">
      <HdFormInput
        v-model="form.code"
        @input="emitEvent"
        placeholder="请输入数学相加后的验证码"
        @focus="errorStore().clearError('captcha')" />
      <div class="flex bg-white">
        <el-image
          :src="captcha.img"
          :lazy="true"
          @click="get"
          class="rounded-lg overflow-hidden shadow-sm cursor-pointer border-teal-700 hover:border-fuchsia-700 border-2 hover:shadow-2xl 2xl:hover:scale-[1.5] hover:z-50 duration-300 w-full bg-white" />
      </div>
    </div>
    <HdError name="captcha" />
  </main>
</template>
