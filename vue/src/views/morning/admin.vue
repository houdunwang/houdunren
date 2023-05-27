<script setup lang="ts">
import dayjs from 'dayjs'

const { collection, findAll, remove } = useMorning()
const route = useRoute()
const page = ref(route.query.page || 1)
await findAll(page.value)
</script>

<template>
  <HdCard class="mt-5">
    <template #header>
      <div class="flex justify-between items-center">
        早起少年
        <el-button type="success" size="default" @click="$router.push({ name: 'morning.create' })">
          新增活动
        </el-button>
      </div>
    </template>
    <section>
      <el-table :data="collection.data" border stripe>
        <el-table-column label="编号" :width="80" #default="{ row }" align="center">
          {{ row.id }}
        </el-table-column>
        <el-table-column label="获得礼品的朋友" #default="{ row }">
          <div class="flex items-center cursor-pointer" v-if="row.user">
            <UserInfoDialog :uid="row.user.id" #default="{ get }">
              <span @click="get">{{ row.user.name }}</span>
            </UserInfoDialog>
          </div>
        </el-table-column>
        <el-table-column label="状态" :width="120" #default="{ row }" align="center">
          <el-tag type="info" size="small" effect="dark" v-if="row.state">已经结束</el-tag>
          <el-tag type="success" size="small" effect="plain" v-else>正在进行</el-tag>
        </el-table-column>
        <el-table-column label="给朋友的礼品" :width="120" #default="{ row }" align="center">
          <a :href="row.url" target="_blank">
            <el-image :src="row.image" fit="cover" :lazy="true" class="w-12 h-12" />
          </a>
        </el-table-column>
        <el-table-column label="开奖时间" #default="{ row }">
          {{ dayjs(row.end_time).format('YYYY-MM-DD HH:mm') }}
        </el-table-column>
        <el-table-column label="操作" :width="150" #default="{ row }" align="center">
          <el-button
            type="primary"
            size="small"
            @click="$router.push({ name: 'morning.edit', params: { id: row.id } })">
            编辑
          </el-button>
          <el-button type="danger" size="small" @click="remove(row.id)">删除</el-button>
        </el-table-column>
      </el-table>
    </section>
    <el-pagination
      v-if="collection.meta"
      @current-change="$router.push({ name: 'morning.admin', query: { page: $event } })"
      :page-sizes="[20, 40, 80, 100]"
      :current-page="+page"
      :page-size="10"
      layout="prev, pager, next"
      :pager-count="5"
      hide-on-single-page
      :total="collection.meta.total"
      background />
  </HdCard>
</template>

<style lang="scss"></style>
