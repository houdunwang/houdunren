<script setup lang="ts">
import dayjs from 'dayjs'
const { open } = useUtil()
const { read } = useNotification()
const { item } = defineProps<{
  item: NotificationModel
}>()
const redirect = async (notification: NotificationModel) => {
  await read(notification)
  const model = notification.data.model.toLocaleLowerCase()
  if (notification.data.type == 'comment') {
    open(`/${model}/${notification.data.model_id}` + `?commentId=${notification.data.id}`)
  }
}
</script>

<template>
  <main class="flex-1">
    <div class="flex justify-between items-center gap-3 cursor-pointer hover:bg-gray-100" @click="redirect(item)">
      <div class="truncate">
        {{ item.data.title }}
      </div>
      <span class="text-xs font-light opacity-80">
        {{ dayjs(item.created_at).fromNow() }}
      </span>
    </div>
  </main>
</template>
