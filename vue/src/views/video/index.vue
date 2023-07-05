<script setup lang="ts">
const route = useRoute()
const { findAll, collection } = useVideo()
await findAll(route.query.page || 1)
</script>

<template>
  <main>
    <HdCard>
      <template #header>
        <section class="flex items-center justify-between 2xl:gap-5">
          <div class="">最近更新</div>
          <VideoSearchForm class="w-8/12 md:w-4/12" />
        </section>
      </template>

      <section v-if="collection" class="!-my-5">
        <VideoItem v-for="video of collection.data" :key="video.id" :video="video" :showTime="true">
          <template #title="props">
            {{ props.video.title.replace(/\d+\s*/, '') }}
          </template>
        </VideoItem>
      </section>
    </HdCard>

    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'video', query: { page: $event } })" />
  </main>
</template>
