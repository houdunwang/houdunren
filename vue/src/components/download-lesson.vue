<script setup lang="ts">
const userStore = useUserStore()
const { isLogin } = useAuth()
const {
  //   id,
  //   type,
  size = 'default',
  lesson,
  system,
} = defineProps<{
  //   id: number
  //   type: 'system' | 'lesson'
  size?: 'default' | 'small'
  lesson?: LessonModel
  system?: SystemModel
}>()

const dialog = ref(false)
const downloadUrl = ref()
if (lesson) downloadUrl.value = lesson.download_address ?? lesson.system?.download_address
if (system) downloadUrl.value = system.download_address
// if (isLogin()) {
//   downloadUrl.value = type == 'lesson' ? await useLesson().getDownloadUrl(id) : await useSystem().getDownloadUrl(id)
// }
</script>

<template>
  <main v-if="isLogin()">
    <el-dialog title="下载高清视频" v-model="dialog">
      <div v-if="downloadUrl">
        {{ downloadUrl }}
      </div>
      <div v-else class="text-lg">
        <div v-if="userStore.user?.isSubscribe">高清版本视频还没有上传</div>
        <div v-else>
          你不是
          <router-link :to="{ name: 'subscribe' }" target="_self" #default="{ href }" class="font-bold text-teal-700">
            订阅用户
          </router-link>
          <br />
          订阅用户可以下载高清视频，可在电脑离线观看视频，更灵活
        </div>
      </div>
    </el-dialog>

    <el-button type="primary" @click="dialog = true" v-bind="$attrs" :size="size">
      <icon-download-one theme="outline" class="mr-1" />高清下载
    </el-button>
  </main>
</template>

<style lang="scss"></style>
