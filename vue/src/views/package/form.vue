<script setup lang="ts">
const { model, find, update, store } = usePackage()
const route = useRoute()
if (route.params.id) {
  await find(+route.params.id)
}
</script>

<template>
  <el-card shadow="never" :body-style="{ padding: '20px' }">
    <template #header> {{ $route.params.id ? '编辑' : '添加' }}套餐 </template>
    <el-form label-width="80px" :inline="false" size="default">
      <el-form-item label="图标">
        <HdUploadSingleImage v-model="model.icon" />
        <HdError name="icon" />
      </el-form-item>
      <el-form-item label="名称">
        <el-input v-model="model.title"></el-input>
        <HdError name="title" />
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
      <el-form-item label="CSS样式">
        <el-input v-model="model.style"></el-input>
        <HdError name="style" />
      </el-form-item>
      <el-form-item label="月数">
        <el-input v-model="model.months" placeholder="开通会员的月数"></el-input>
        <HdError name="months" />
      </el-form-item>
      <el-form-item label="状态">
        <el-radio-group v-model="model.state" size="default">
          <el-radio-button :label="true"> 开启 </el-radio-button>
          <el-radio-button :label="false"> 关闭 </el-radio-button>
        </el-radio-group>
        <HdError name="state" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="$route.params.id ? update() : store()">保存提交</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>

<style lang="scss"></style>
