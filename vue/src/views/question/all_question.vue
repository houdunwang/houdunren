<script setup lang="ts">
import useQuestion from '@/composables/useQuestion'
import Layout from './layout.vue'
const route = useRoute()
const { collection, getAllQuestion } = useQuestion()
await getAllQuestion(route.query.page || 1)
</script>

<template>
  <Layout>
    <template #tip> 下面是网站的所有考题，感谢每一位出题的朋友 </template>
    <section v-if="collection">
      <div class="border py-3 px-5 mt-3 bg-white rounded-md" v-for="item of collection.data" :key="item.id">
        <div class="border-b py-3 mb-3 border-b-gray-200">
          <el-button
            type="primary"
            size="small"
            plain
            @click="$router.push({ name: 'question.show', params: { id: item.id } })">
            查看考题
          </el-button>
        </div>
        <div class="truncate cursor-pointer" @click="$router.push({ name: 'question.show', params: { id: item.id } })">
          <HdMarkdownPreview :text="item.html" />
        </div>
      </div>
      <Pagination
        :per_page="collection.meta.per_page"
        :total="collection.meta.total"
        @current-change="$router.push({ name: 'question.all_question', query: { page: $event } })" />
    </section>
  </Layout>
</template>

<style lang="scss" scoped></style>
