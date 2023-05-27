<script setup lang="ts">
import dayjs from 'dayjs'
import Layout from '../question/layout.vue'
const route = useRoute()
const { myAnswerList } = useQuestionAnswer()
const collection = await myAnswerList(route.query.page || 1)
</script>

<template>
  <Layout>
    <section v-if="collection.data.length">
      <el-table
        :data="collection.data"
        border
        stripe
        size="large"
        header-cell-class-name="text-base"
        cell-class-name="text-base py-4 text-center text-gray-600 "
        class="hidden md:flex">
        <el-table-column label="考试时间" #default="{ row }" align="left">
          {{ dayjs(row.created_at).format('YYYY-MM-DD') }}
        </el-table-column>
        <el-table-column label="成绩" #default="{ row }" align="center"> {{ row.mark }} 分 </el-table-column>
        <el-table-column label="成绩" #default="{ row }" align="center">
          <el-button
            type="primary"
            size="default"
            @click="$router.push({ name: 'question.answer.show', params: { id: row.id } })"
            >查看考卷</el-button
          >
        </el-table-column>
      </el-table>

      <Pagination
        :per_page="collection.meta.per_page"
        :total="collection.meta.total"
        @current-change="$router.push({ name: 'question.answer.my_answer_list', query: { page: $event } })" />
    </section>
    <section class="p-5 bg-white border border-gray-200 text-center text-gray-600 rounded-md" v-else>
      你还没有参加过考试
    </section>
  </Layout>
</template>

<style lang="scss"></style>
