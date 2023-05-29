<script setup lang="ts">
defineProps<{
  captcha: string
  captcha_key: string
}>()
const emit = defineEmits(['update:captcha_key', 'update:captcha'])
const { getCaptcha, captcha: captchaValue } = useCaptcha()

watch(captchaValue, () => {
  emit('update:captcha_key', captchaValue.value?.key)
})

await getCaptcha()
</script>

<template>
  <main>
    <section class="flex gap-1">
      <HdFormInput @input="$emit('update:captcha', $event.target.value)" placeholder="验证码" />
      <el-image :src="captchaValue?.img" class="rounded-md md:w-[180px] border cursor-pointer" @click="getCaptcha" />
    </section>

    <HdError name="captcha" />
  </main>
</template>

<style lang="scss"></style>
