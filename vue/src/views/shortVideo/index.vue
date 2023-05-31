<script setup lang="ts">
const { collection, getAll } = useShortVideo()
const route = useRoute()
await getAll(route.query.page || 1)
</script>

<template>
  <main v-if="collection">
    <HdCard>
      <template #header>
        <div class="flex items-center justify-between">
          <span class="">短视频</span>
          <span class="text-base font-light flex items-center gap-1">
            <icon-video-two theme="outline" size="24" class="text-green-700" />
            大叔的短视频，希望朋友们喜欢
          </span>
        </div>
      </template>
      <section class="grid grid-cols-3 gap-3">
        <shortVideoItem v-for="video of collection.data" :key="video.id" :video="video" />
      </section>
    </HdCard>

    <Pagination
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'shortvideo.index', query: { page: $event } })" />
  </main>
</template>
