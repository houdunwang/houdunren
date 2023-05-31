<script setup lang="ts">
import LessonItem from '@/components/lesson-item.vue'
import Pagination from '@/components/pagination.vue'
import lesson from '@/routes/lesson'
const { findAll, collection } = useLesson()
const storage = useStorage()
const route = useRoute()
await findAll(route.query.page)

onActivated(async () => {
  await findAll(route.query.page)
})
const lessonShowType = ref<'image' | 'color'>(storage.get('lesson_show_type', 'color'))
watch(lessonShowType, (type) => {
  storage.set('lesson_show_type', type)
})
</script>

<template>
  <main>
    <HdCard>
      <template #header>
        <section class="flex flex-col md:flex-row md:items-center gap-2 justify-between 2xl:gap-5">
          <div class="hidden md:block">碎片课程</div>
          <div class="flex-1 md:justify-end flex flex-col md:flex-row gap-2">
            <el-radio-group v-model="lessonShowType" size="large">
              <el-radio label="image" border class="mx-0!">图片</el-radio>
              <el-radio label="color" border>随机颜色</el-radio>
            </el-radio-group>
            <VideoSearchForm class="2xl:w-5/12 flex-1 xl:flex-none" />
          </div>
        </section>
      </template>
      <section
        class="grid grid-flow-row md:grid-cols-3 lg:grid-cols-4 gap-5 bg-white rounded-md"
        v-if="collection.data.length">
        <LessonItem v-for="item of collection.data" :key="item.id" :item="item" :show-type="lessonShowType" />
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

<style lang="scss" scoped>
:deep(.el-radio.is-bordered.el-radio--large) {
  margin: 0 10px 0 0px;
}
</style>
