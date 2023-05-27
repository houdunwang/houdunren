<script setup lang="ts">
const route = useRoute()
const content = ref(route.query.content)
const { search, collection } = useVideo()
search(route.query.content, route.query.page || 1)
</script>

<template>
  <main v-if="collection">
    <HdCard>
      <template #header>
        <section class="flex flex-col justify-start md:flex-row md:items-center md:justify-between 2xl:gap-5">
          <span class="hidden md:block">搜索结果</span>
          <VideoSearchForm />
        </section>
      </template>
      <VideoItem v-for="video of collection.data" :key="video.id" :video="video" class="p-5 py-5" />
      <div class="p-5 flex items-center justify-center gap-1 text-gray-600 text-sm" v-if="collection.data.length == 0">
        <icon-info theme="outline" />
        暂无结果
      </div>
    </HdCard>

    <Pagination
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'video.search', query: { page: $event, content } })" />
  </main>
</template>
