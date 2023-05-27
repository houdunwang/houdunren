<script setup lang="ts">
const route = useRoute()
const { getUserFavorite, collection } = useFavorite()
await getUserFavorite('Topic', route.query.uid)
</script>

<template>
  <main v-if="collection">
    <div class="bg-white px-5 shadow-sm rounded-md border">
      <div v-if="collection?.data.length">
        <TopicItem v-for="item of collection.data" :key="item.id" :item="item" />
      </div>
      <div class="text-center py-5" v-else>这是新朋友 ，TA还没有收藏贴子</div>
    </div>

    <Pagination
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'topic.space', query: { page: $event, uid: $route.query.uid } })" />
  </main>
</template>
