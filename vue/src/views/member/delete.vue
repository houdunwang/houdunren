<script setup lang="ts">
import { ElMessageBox } from 'element-plus'
const { deleteUser } = useUser()
const tab = ref('delete')
const onSubmit = async () => {
  await ElMessageBox.confirm('注销帐号，将删除所有在网站的数据！！！', '重要提示')
  await ElMessageBox.confirm('你需要再考虑一下，真的删除吗？', '重要提示')
  await ElMessageBox.confirm('再考虑一下，是否想好了？', '重要提示')
  await ElMessageBox.confirm('最后确定一下，真的删除吗？', '重要提示')
  await deleteUser()
}
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top" @tab-click="">
      <el-tab-pane label="注销帐号" name="delete">
        <el-button type="danger" @click="onSubmit">删除帐号</el-button>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>

<style lang="scss"></style>
