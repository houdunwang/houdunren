<script setup lang="ts">
const tab = ref('password')
const { updateMobile } = useUser()
const { user } = useUserStore()
const form = reactive({ account: '', code: '' })
const onSubmit = async () => {
  await updateMobile(form)
}
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top" @tab-click="">
      <el-tab-pane label="绑定手机" name="password">
        <div class="mb-2" v-if="user?.mobile">
          <el-alert
            :title="`已绑定手机号 ${user.mobile}`"
            type="success"
            effect="light"
            show-icon
            closable
            class="mb-3" />
        </div>
        <el-form label-width="80px" :inline="false" size="large" class="border p-5 rounded-2xl" label-position="top">
          <el-form-item label="手机">
            <el-input v-model="form.account"></el-input>
            <HdError name="account" />
          </el-form-item>
          <el-form-item label="验证码">
            <CodeSend v-model:code="form.code" v-model:account="form.account" type="no-exists" class="w-full" />
            <HdError name="code" />
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">确定修改</el-button>
          </el-form-item>
        </el-form>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
