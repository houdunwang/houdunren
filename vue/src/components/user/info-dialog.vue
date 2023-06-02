<script setup lang="ts">
const { uid } = defineProps<{ uid: any }>()
const { getUserInfo, model } = useUser()
const dialog = ref(false)
const get = () => {
  dialog.value = true
  getUserInfo(uid)
}
</script>

<template>
  <main class="">
    <el-dialog title="用户资料" v-model="dialog" append-to-body>
      <el-form :model="model" ref="form" label-width="80px" :inline="false" size="default" v-if="model">
        <el-form-item label="昵称">
          <el-input v-model="model.nickname"></el-input>
        </el-form-item>
        <el-form-item label="头像">
          <UserAvatar :user="model" />
        </el-form-item>
        <el-form-item label="电话">
          <el-input v-model="model.mobile"></el-input>
        </el-form-item>
        <el-form-item label="地址">
          <el-input v-model="model.address"></el-input>
        </el-form-item>
        <el-form-item label="邮箱">
          <el-input v-model="model.email"></el-input>
        </el-form-item>
        <el-form-item label="主页">
          <el-input v-model="model.home"></el-input>
        </el-form-item>
      </el-form>
    </el-dialog>
    <slot :get="get">
      <el-button type="primary" size="default" @click="get">查看资料</el-button>
    </slot>
  </main>
</template>
