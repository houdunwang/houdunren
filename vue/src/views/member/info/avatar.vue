<script setup lang="ts">
const { user } = useUserStore()
const { update } = useUser()
</script>

<template>
  <el-form label-width="80px" :inline="false" size="large" class="border p-5 rounded-2xl" v-if="user">
    <HdUploadSingleImage v-model="user.avatar" url="upload/avatar" @finish="update(user)" />
  </el-form>
</template>

<style lang="scss"></style>
