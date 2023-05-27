<script setup lang="ts">
const route = useRoute()
const { getUserFavorite, collection } = useFavorite()
await getUserFavorite('Video', route.query.uid)
</script>

<template>
  <main>
    <div class="bg-white shadow-sm rounded-md border px-5">
      <div v-if="collection?.data.length">
        <VideoItem v-for="video of collection.data" :key="video.id" :video="video" :showTime="false">
          <template #title="props">
            {{ props.video.title.replace(/^\d+\s*/, '') }}
          </template>
        </VideoItem>
      </div>
      <div v-else class="text-center py-5">还没有收藏任何视频</div>
    </div>

    <Pagination
      v-if="collection && collection.meta.last_page > 1"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="
        $router.push({
          name: 'video.space.favorite',
          query: { uid: $route.query.uid, page: $event },
        })
      " />
  </main>
</template>
