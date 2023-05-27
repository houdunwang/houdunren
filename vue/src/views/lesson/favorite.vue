<script setup lang="ts">
const route = useRoute()
const { getUserFavorite, collection } = useFavorite()
await getUserFavorite('Lesson', route.query.uid)
</script>

<template>
  <main>
    <div class="bg-white p-5 shadow-sm rounded-md border">
      <div v-if="collection?.data.length" class="grid 2xl:grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <LessonItem v-for="item of collection.data" :key="item.id" :item="item" />
      </div>
      <div class="text-center" v-else>还没有收藏任何课程</div>
    </div>

    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="
        $router.push({ name: 'lesson.space.favorite', query: { uid: $route.query.uid, page: $event } })
      " />
  </main>
</template>
