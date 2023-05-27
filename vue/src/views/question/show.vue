<script setup lang="ts">
import useQuestion from '@/composables/useQuestion'
import QuestionAvatar from './components/question-avatar.vue'
import Layout from './layout.vue'
const util = useUtil()
const id = util.routeParams('id')
const { find, getRelationQuestion } = useQuestion()
const [model, relationQuestion] = await Promise.all([find(id), getRelationQuestion(id)])
</script>

<template>
  <Layout>
    <HdCard class="col-span-8 mb-5">
      <template #header>
        <section class="flex justify-between">
          <QuestionAvatar :question="model" />
          <div class="flex items-center"><icon-correct theme="filled" size="24" fill="#16a085" /> 表示正确答案</div>
        </section>
      </template>
      <HdMarkdownPreview :text="model.html" />
      <h2 class="py-3 text-lg mt-3 flex items-center gap-2">
        <el-tag type="success" size="large" effect="plain" :closable="false">
          {{ model.type == 'radio' ? '单选题' : '多选题' }}
        </el-tag>
      </h2>
      <div
        class="border p-3 mb-2 bg-gray-100 rounded-sm flex items-center gap-2"
        v-for="(item, index) of model.lists"
        :key="index">
        {{ item.title }}
        <icon-correct theme="filled" size="24" fill="#16a085" v-if="model.answer.some((a) => a == index)" />
      </div>
    </HdCard>

    <HdCard class="col-span-8 mb-5">
      <template #header> 推荐到题库 </template>
      <section class="text-center mb-3">
        需要3个同学点赞后，本题才会成为每天【金榜提名】的考试题。如果你觉得这道题不错，就点个赞助力吧。
      </section>
      <section class="">
        <Favour module="edu" model="Question" :id="model.id" size="large" />
      </section>
      <template #footer>
        <div class="flex justify-center">
          <el-button
            type="primary"
            plain
            size="default"
            @click="util.open({ name: 'question.show', params: { id: relationQuestion.prev_question.id } })"
            v-if="relationQuestion.prev_question">
            上一题
          </el-button>
          <el-button
            type="success"
            plain
            size="default"
            @click="util.open({ name: 'question.show', params: { id: relationQuestion.next_question.id } })"
            v-if="relationQuestion.next_question">
            下一题
          </el-button>
        </div>
      </template>
    </HdCard>

    <CommentList module="Edu" model="Question" :id="model.id">
      <template #header> 分享下解题思路 </template>
    </CommentList>
  </Layout>
</template>
