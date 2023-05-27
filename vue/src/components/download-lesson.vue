<script setup lang="ts">
const { download_address = '' } = defineProps<{
  download_address?: string
}>()

const dialog = ref(false)
</script>

<template>
  <main>
    <el-dialog title="下载高清视频" v-model="dialog">
      <div v-if="download_address">
        {{ download_address }}
      </div>
      <div v-else class="text-lg">
        <router-link :to="{ name: 'subscribe' }" target="_self" #default="{ href }" custom>
          <a :href="href" target="_self" class="font-bold text-teal-700">订阅用户</a>
        </router-link>
        可以下载高清版视频，视频质量更清晰，可在电脑离线观看视频
      </div>
    </el-dialog>

    <el-button type="primary" @click="dialog = true" v-bind="$attrs" size="small">
      <icon-download-one theme="outline" class="mr-1" />高清下载
    </el-button>
  </main>
</template>

<style lang="scss"></style>
