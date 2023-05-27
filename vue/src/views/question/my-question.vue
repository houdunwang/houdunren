<script setup lang="ts">
import useQuestion from '@/composables/useQuestion'
import Layout from './layout.vue'
const { authorize } = useAuth()
const userStore = useUserStore()
const { collection, getUserQuestion, del } = useQuestion()
await getUserQuestion(userStore.user?.id)
</script>

<template>
  <Layout>
    <template #tip> 感谢你出的题，帮助到努力前进的少年 </template>
    <section v-if="!collection?.data.length" class="p-5 bg-white rounded-lg text-center">你还没有出过题</section>
    <section v-else>
      <div class="border py-3 px-5 mt-3 bg-white" v-for="item of collection.data" :key="item.id">
        <div class="truncate">
          <HdMarkdownPreview :text="item.html" />
        </div>
        <div class="mt-2">
          <el-button-group>
            <el-button
              type="primary"
              size="small"
              @click="$router.push({ name: 'question.show', params: { id: item.id } })">
              查看
            </el-button>
            <el-button
              type="success"
              size="small"
              @click="$router.push({ name: 'question.edit', params: { id: item.id } })"
              v-if="authorize(item.user?.id)">
              修改
            </el-button>
            <el-button type="danger" size="small" @click="del(item.id)" v-if="authorize(item.user?.id)">
              删除
            </el-button>
          </el-button-group>
        </div>
      </div>
      <Pagination
        v-if="collection"
        :per_page="collection.meta.per_page"
        :total="collection.meta.total"
        @current-change="$router.push({ name: 'question.my', query: { page: $event } })" />
    </section>
  </Layout>
</template>

<style lang="scss" scoped>
.items > :nth-child(even) {
  @apply bg-gray-50;
}
</style>
