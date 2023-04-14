<script setup lang="ts">
const { user } = useUserStore()
const { updateEmail } = useUser()
const form = reactive({ account: '', code: '' })
</script>

<template>
  <main>
    <div class="mb-2" v-if="user?.email">
      <el-alert :title="`已经绑定邮箱 ${user.email}`" type="success" effect="light" show-icon closable class="mb-3" />
    </div>

    <el-form label-width="80px" :inline="false" size="large" class="border p-5 rounded-2xl">
      <el-form-item label="邮箱">
        <el-input type="email" v-model="form.account" placeholder="请输入新邮箱"></el-input>
        <HdError name="account" />
      </el-form-item>
      <el-form-item label="验证码">
        <HdCodeSend v-model:code="form.code" v-model:account="form.account" type="no-exists" class="mt-3 w-full" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="updateEmail(form)">确定修改</el-button>
      </el-form-item>
    </el-form>
  </main>
</template>

<style lang="scss"></style>
