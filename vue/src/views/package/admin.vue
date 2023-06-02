<script setup lang="ts">
const { getAll, collection, destroy } = usePackage()
await getAll()
</script>

<template>
  <main>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div class="flex justify-between">
          套餐定义
          <el-button type="primary" size="default" @click="$router.push({ name: 'package.create' })">
            添加套餐
          </el-button>
        </div>
      </template>
      <div class="grid gap-3 2xl:grid-cols-4 xl:grid-cols-3 lg:grid-cols-2">
        <PackageItem v-for="item of collection" :key="item.id" :item="item" @del="destroy" :show-button="true" />
      </div>
    </el-card>
  </main>
</template>

<style lang="scss"></style>
