<script setup lang="ts">
const { collection, findAll } = useLesson()
const route = useRoute()
await findAll(route.query.page || 1, { row: 12 })
</script>

<template>
  <main>
    <HdCard v-if="collection">
      <template #header>
        <div class="flex justify-between items-center">
          课程管理
          <el-button type="primary" size="default" @click="$router.push({ name: 'lesson.create' })">
            添加课程
          </el-button>
        </div>
      </template>
      <template #default>
        <section class="grid lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-5 gap-3 bg-white rounded-md">
          <LessonItem v-for="item of collection.data" :key="item.id!" :item="item" />
        </section>
      </template>
    </HdCard>

    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'lesson.admin', query: { page: $event } })" />
  </main>
</template>
