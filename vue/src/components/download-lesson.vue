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
        你不是
        <router-link :to="{ name: 'subscribe' }" target="_self" #default="{ href }" class="font-bold text-teal-700">
          订阅用户
        </router-link>
        或高清版本视频还没有上传
        <!-- <br />
        可以下载高清版视频，视频质量更清晰，可在电脑离线观看视频 -->
      </div>
    </el-dialog>

    <el-button type="primary" @click="dialog = true" v-bind="$attrs" size="default">
      <icon-download-one theme="outline" class="mr-1" />高清下载
    </el-button>
  </main>
</template>

<style lang="scss"></style>
