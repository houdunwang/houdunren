<script setup lang="ts">
const { resetError } = useErrorStore()
const { updateMobile } = useUser()
const userStore = useUserStore()
const form = reactive({ account: '', code: '' })
const onSubmit = async () => {
  await updateMobile(form)
}
</script>

<template>
  <main>
    <div class="mb-2" v-if="userStore.user?.mobile">
      <el-alert
        :title="`已绑定手机号 ${userStore.user.mobile}，你可以在下面重新绑定新手机号`"
        type="success"
        effect="light"
        show-icon
        closable
        class="mb-3" />
    </div>
    <el-form label-width="80px" :inline="false" size="large" class="border p-5 rounded-2xl">
      <el-form-item label="手机">
        <el-input v-model="form.account" placeholder="请输入手机号" @focus="resetError"></el-input>
        <HdError name="account" />
      </el-form-item>
      <el-form-item label="验证码">
        <HdCodeSend v-model:code="form.code" v-model:account="form.account" type="no-exists" class="w-full" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit">确定修改</el-button>
      </el-form-item>
    </el-form>
  </main>
</template>
