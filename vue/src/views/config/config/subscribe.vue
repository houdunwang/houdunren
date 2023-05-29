<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="80px" label-position="top">
    <el-card shadow="never" :body-style="{ padding: '20px' }" class="mb-3">
      <template #header> 年会员 </template>
      <div class="grid lg:grid-cols-3 gap-3">
        <el-form-item label="价格">
          <el-input v-model="config.subscribe.year.price" />
        </el-form-item>
        <el-form-item label="原价">
          <el-input v-model="config.subscribe.year.original" />
        </el-form-item>
        <el-form-item label="开启">
          <el-checkbox v-model="config.subscribe.year.state"> 开启 </el-checkbox>
        </el-form-item>
      </div>
    </el-card>

    <el-card shadow="never" :body-style="{ padding: '20px' }">
      <template #header> 永久帐号 </template>
      <div class="grid lg:grid-cols-3 gap-3">
        <el-form-item label="价格">
          <el-input v-model="config.subscribe.permanent.price" />
        </el-form-item>
        <el-form-item label="原价">
          <el-input v-model="config.subscribe.permanent.original" />
        </el-form-item>
        <el-form-item label="开启">
          <el-checkbox v-model="config.subscribe.permanent.state" label="1"> 开启 </el-checkbox>
        </el-form-item>
      </div>
    </el-card>
  </el-form>
</template>

<style lang="scss"></style>
