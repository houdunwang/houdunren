<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'
import dayjs from 'dayjs'
const { authorize } = useAuth()
const route = useRoute()
const { getUserSignList, userCollection, remove } = useSign()
await Promise.all([getUserSignList(route.query.uid, route.query.page || 1)])
</script>

<template>
  <main v-if="userCollection">
    <el-table
      :data="userCollection.data"
      border
      stripe
      size="large"
      header-cell-class-name="text-base"
      cell-class-name="text-base !py-3 text-center text-gray-600"
      class="hidden md:flex">
      <el-table-column label="签到日期" :width="200" #default="{ row }" align="center">
        {{ dayjs(row.created_at).format('YYYY-MM-DD HH:mm') }}
      </el-table-column>
      <el-table-column label="签到心情" #default="{ row }">
        <div class="flex items-center justify-between">
          <div class="truncate">{{ row.content }}</div>
          <el-button type="warning" size="small" plain @click="remove(+row.id)" v-if="authorize(row.user.user_id)">
            删除
          </el-button>
        </div>
      </el-table-column>
    </el-table>

    <!-- 移动端显示 -->
    <div class="bg-white border p-2 rounded-md mb-2 md:hidden" v-for="item of userCollection.data" :key="item.id">
      <div class="flex flex-col justify-between">
        <div class="opacity-90 w-full">
          {{ item.content }}
        </div>
        <div class="text-sm flex gap-3 font-light mt-1">
          <router-link :to="{ name: 'sign.space', query: { uid: item.user_id } }" class="opacity-70">
            {{ item.user.nickname }}
          </router-link>
          <span> {{ dayjs(item.created_at).fromNow() }} 签到</span>
        </div>
      </div>
    </div>

    <Pagination
      :per_page="userCollection.meta.per_page"
      :total="userCollection.meta.total"
      @current-change="$router.push({ name: 'sign.space', query: { uid: $route.query.uid, page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
