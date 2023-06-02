<script setup lang="ts">
const { model, find, update, store } = usePackage()
const route = useRoute()
if (route.params.id) {
  await find(+route.params.id)
}
</script>

<template>
  <el-card shadow="always" :body-style="{ padding: '20px' }">
    <template #header> {{ $route.params.id ? '编辑' : '添加' }}套餐 </template>
    <el-form label-width="80px" :inline="false" size="default">
      <el-form-item label="名称">
        <el-input v-model="model.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="图标">
        <HdUploadSingleImage v-model="model.icon" />
        <HdError name="icon" />
      </el-form-item>
      <el-form-item label="文字颜色">
        <el-input v-model="model.text_color"></el-input>
        <HdError name="text_color" />
      </el-form-item>
      <el-form-item label="背景颜色">
        <el-input v-model="model.bg_color"></el-input>
        <HdError name="bg_color" />
      </el-form-item>
      <el-form-item label="广告语">
        <el-input v-model="model.ad"></el-input>
        <HdError name="ad" />
      </el-form-item>
      <el-form-item label="价格">
        <el-input v-model="model.price"></el-input>
        <HdError name="price" />
      </el-form-item>
      <el-form-item label="原价">
        <el-input v-model="model.original_price"></el-input>
        <HdError name="original_price" />
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="$route.params.id ? update() : store()">保存提交</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>

<style lang="scss"></style>
