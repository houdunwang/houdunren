<script setup lang="ts">
import Pagination from '@/components/pagination.vue'
const { getAll, collection, del } = useShortVideo()
const route = useRoute()
await getAll(route.query.page, 10)
</script>

<template>
  <main>
    <HdCard>
      <template #header>
        <div class="flex justify-between items-center">
          短视频
          <el-button type="success" size="default" @click="$router.push({ name: 'shortvideo.create' })">
            添加课程
          </el-button>
        </div>
      </template>
      <section class="grid grid-flow-row md:grid-cols-5 lg:grid-cols-4 gap-5" v-if="collection">
        <ShortVideoItem v-for="item of collection.data" :key="item.id" :video="item" @del="del" />
      </section>
    </HdCard>
    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'shortvideo.index', query: { page: $event } })" />
  </main>
</template>
