<script setup lang="ts">
import Layout from '../question/layout.vue'

const route = useRoute()
const { find } = useQuestionAnswer()
const result = await find(route.params.id)

//问题答案
const questionAnswer = (question: QuestionModel) => {
  return result.answer.answers.find((answer: any) => answer.id == question.id)
}
</script>

<template>
  <Layout>
    <HdCard class="col-span-8 mb-5">
      <div class="flex items-center justify-between">考试成绩 {{ result.answer.mark }} 分，下面是答题结果</div>
    </HdCard>
    <HdCard class="col-span-8 mb-5 relative" v-for="(question, index) of result.questions" :key="question.id">
      <section class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <div class="rounded-full">
            第
            <div class="font-bold inline-flex justify-center items-center">
              {{ index + 1 }}
            </div>
            题
          </div>
          <icon-check-one theme="filled" size="20" fill="#16a085" v-if="questionAnswer(question)?.success" />
          <icon-close-one theme="filled" size="20" fill="#d35400" v-else />
        </div>
        <el-button
          type="primary"
          plain
          size="default"
          @click="$router.push({ name: 'question.show', params: { id: question.id } })">
          提建议
        </el-button>
      </section>
      <HdMarkdownPreview :text="question.html" />
      <section class="flex flex-col gap-2 mt-3">
        <div class="flex items-center gap-2" v-for="(item, index) of question.lists" :key="index">
          <div class="rounded-md p-3 w-full border flex items-center gap-2">
            {{ item.title }}
            <el-tag
              type="success"
              size="small"
              effect="plain"
              :closable="false"
              v-if="question.answer.some((i) => i == index)">
              正确答案
            </el-tag>

            <el-tag
              type="info"
              size="small"
              effect="plain"
              :closable="false"
              v-if="questionAnswer(question)?.answer.some((i) => i == index)">
              你的选择
            </el-tag>
          </div>
        </div>
      </section>
    </HdCard>
  </Layout>
</template>
