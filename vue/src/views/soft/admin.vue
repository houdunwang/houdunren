<script setup lang="ts">
import router from '@/plugins/router'

const { collection, getAll, destroy } = useSoft()
await getAll()
</script>

<template>
  <main class="">
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div class="flex justify-between items-center">
          软件管理
          <el-button type="primary" size="default" @click="$router.push({ name: 'soft.create' })">发布软件</el-button>
        </div>
      </template>
      <section class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-2">
        <SoftItem v-for="soft of collection" :key="soft.id" :soft="soft" :showButton="true" @del="destroy" />
      </section>
    </el-card>
  </main>
</template>

<style lang="scss"></style>
