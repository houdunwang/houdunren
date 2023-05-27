<script setup lang="ts">
import Pagination from '@/components/pagination.vue'

const route = useRoute()
const { userToipcList, collection } = useTopic()
userToipcList(route.query.uid, route.query.page || 1)
</script>

<template>
  <main v-if="collection">
    <section class="bg-white border shadow-sm rounded-md px-5">
      <div v-if="collection?.data.length">
        <TopicItem v-for="item of collection.data" :key="item.id" :item="item" />
      </div>
      <div class="text-center py-5" v-else>这是新朋友 ，TA还没有发布贴子</div>
    </section>

    <Pagination
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'topic.space', query: { uid: $route.query.uid, page: $event } })" />
  </main>
</template>
