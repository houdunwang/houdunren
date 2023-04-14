<script setup lang="ts">
const { updatePassword } = useUser()
const form = reactive({ password: '', password_confirmation: '' })
const onSubmit = async () => {
  await updatePassword(form)
}
</script>

<template>
  <main>
    <el-form label-width="80px" :inline="false" class="border p-5 rounded-2xl">
      <el-form-item label="新密码">
        <el-input type="password" v-model="form.password"></el-input>
        <HdError name="password" />
      </el-form-item>
      <el-form-item label="确认密码">
        <el-input type="password" v-model="form.password_confirmation"></el-input>
        <HdError name="password_confirmation" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit">确定修改</el-button>
      </el-form-item>
    </el-form>
  </main>
</template>

<style lang="scss"></style>
