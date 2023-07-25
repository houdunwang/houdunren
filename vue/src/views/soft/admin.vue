<script setup lang="ts">
import { http } from '@/plugins/axios'

const { collection, getAll, destroy } = useSoft()
await getAll()
const zipWallpaper = async () => {
  http.request({
    url: 'wallpaper/zip',
  })
}
</script>

<template>
  <main class="">
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div class="flex justify-between items-center">
          软件管理
          <div class="flex items-center">
            <el-button type="primary" size="default" @click="zipWallpaper">压缩壁纸</el-button>
            <el-button type="primary" size="default" @click="$router.push({ name: 'soft.create' })">发布软件</el-button>
          </div>
        </div>
      </template>
      <section class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-2">
        <SoftItem v-for="soft of collection" :key="soft.id" :soft="soft" :showButton="true" @del="destroy" />
      </section>
    </el-card>
  </main>
</template>

<style lang="scss"></style>
