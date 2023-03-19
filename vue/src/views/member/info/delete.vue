<script setup lang="ts">
import { ElMessageBox } from 'element-plus'
const { deleteUser } = useUser()
const onSubmit = async () => {
  await ElMessageBox.confirm('注销帐号，将删除该用户在网站的所有数据！！！', '重要提示')
  await ElMessageBox.confirm('你需要再考虑一下，真的删除吗？', '重要提示')
  await ElMessageBox.confirm('再考虑一下，是否想好了？', '重要提示')
  await ElMessageBox.confirm('最后确定一下，真的删除吗？', '重要提示')
  await deleteUser()
}
</script>

<template>
  <main class="border p-5 rounded-lg">
    <el-button type="danger" @click="onSubmit">注销帐号</el-button>
  </main>
</template>

<style lang="scss"></style>
