<script setup lang="ts">
import LessonItem from '@/components/lesson-item.vue'
import Pagination from '@/components/pagination.vue'
const { findAll, collection } = useLesson()
const route = useRoute()
await findAll(route.query.page)
</script>

<template>
  <main>
    <HdCard>
      <template #header>
        <section class="flex flex-row items-center gap-2 justify-between 2xl:gap-5">
          <span class="">碎片课程</span>
          <VideoSearchForm class="2xl:w-5/12 flex-1 xl:flex-none" />
        </section>
      </template>
      <section
        class="grid grid-flow-row md:grid-cols-3 lg:grid-cols-4 gap-5 bg-white rounded-md"
        v-if="collection.data.length">
        <LessonItem v-for="item of collection.data" :key="item.id" :item="item" />
      </section>
      <section v-else class="text-center text-gray-600">暂无课程</section>
    </HdCard>
    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'lesson', query: { page: $event } })" />
  </main>
</template>
