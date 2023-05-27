<script setup lang="ts">
import NotificationItem from './notification-item.vue'
const { collection, findAll } = useNotification()
findAll(1, 'unread')

const time = setInterval(() => findAll(1, 'unread'), 60000)
onBeforeRouteLeave(() => clearInterval(time))
</script>

<template>
  <main class="flex items-center">
    <el-dropdown trigger="click" v-if="collection?.data.length">
      <icon-message-unread theme="outline" size="22" class="text-gray-700 hover:text-gray-500" />
      <template #dropdown>
        <el-dropdown-menu>
          <el-dropdown-item
            v-for="notification of collection.data"
            :key="notification.id"
            class="border-b border-b-gray-100 text-xs">
            <notification-item :item="notification" />
          </el-dropdown-item>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </main>
</template>
