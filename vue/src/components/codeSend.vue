<script setup lang="ts">
const props = defineProps<{
  placeholder?: string
  code: string
  account: string
  type: 'exists' | 'no-exists'
}>()
const { code, account, type } = props
defineEmits(['update:code', 'update:account'])

const { sendCode } = useCode()
const form = reactive({ account, code })
watch(
  () => props.account,
  (n) => (form.account = n),
)

const { exec, time } = useIntervalRequest(60, async () => {
  await sendCode(form, type)
})
</script>

<template>
  <main>
    <div class="flex items-center gap-1">
      <el-input
        v-model="form.code"
        @input="$emit('update:code', form.code)"
        placeholder="请输入收到的验证码"
        size="large" />
      <el-button disabled size="large" v-if="time">请{{ time }}后操作</el-button>
      <el-button type="danger" size="large" @click="exec" v-else>发送验证码</el-button>
    </div>
    <HdError name="code" />
  </main>
</template>
