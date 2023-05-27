<script setup lang="ts">
import useQuestion from '@/composables/useQuestion'
import useUtil from '@/composables/hd/useUtil'
import QuestionAvatar from './components/question-avatar.vue'
import Layout from './layout.vue'

const util = useUtil()
const { collection, getExamine } = useQuestion()
await getExamine()
</script>

<template>
  <Layout>
    <template #tip>
      下面是待审核的考题，有3个人点赞后，将会进入
      <RouterLink :to="{ name: 'question' }" class="text-[#16a085] hover:text-[#e67e22]"> 【金榜提名】 </RouterLink>
      题库
    </template>
    <section v-if="!collection?.data.length" class="p-3 bg-white rounded-lg text-center">
      所有题都被审核过了 <br />
      <el-button type="primary" size="small" @click="$router.push({ name: 'question.all_question' })" class="mt-2">
        所有考题
      </el-button>
      <el-button type="primary" size="small" @click="$router.push({ name: 'question.create' })" class="mt-2">
        我要出题
      </el-button>
    </section>

    <section v-else>
      <div class="border py-3 px-5 mt-3 bg-white" v-for="item of collection.data" :key="item.id">
        <div class="border-b py-3 mb-3 border-b-gray-200">
          <!-- <QuestionAvatar :question="item">

          </QuestionAvatar> -->
          <div class="mt-2 flex gap-2 items-stretch">
            <el-button
              type="primary"
              plain
              size="small"
              @click="$router.push({ name: 'question.show', params: { id: item.id } })">
              审题入库
            </el-button>
            <div
              class="bg-gray-50 rounded-sm px-3 flex items-center text-gray-500 opacity-80 text-xs border border-gray-200">
              还差 {{ 3 - item.favour_count }} 人
            </div>
          </div>
        </div>
        <div class="truncate cursor-pointer" @click="$router.push({ name: 'question.show', params: { id: item.id } })">
          <HdMarkdownPreview :text="item.html" />
        </div>
      </div>

      <Pagination
        v-if="collection"
        :per_page="collection.meta.per_page"
        :total="collection.meta.total"
        @current-change="$router.push({ name: 'question.examine', query: { page: $event } })" />
    </section>
  </Layout>
</template>

<style lang="scss" scoped></style>
