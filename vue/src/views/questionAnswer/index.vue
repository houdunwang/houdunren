<script setup lang="ts">
const { getQuestions, questions, submit, error } = useQuestionAnswer()
await getQuestions()
//选择答案后
const changeSelect = async (question: QuestionModel, index: number) => {
  if (question.type == 'radio') {
    question.answer = [index]
  }
}
</script>

<template>
  <main class="2xl:w-page m-auto mt-10" v-if="questions?.length">
    <section class="border bg-white p-5 text-center rounded-lg" v-if="error">
      <div class="mb-3">{{ error }}</div>
    </section>
    <section v-else>
      <HdCard class="col-span-8 mb-5">
        <div class="flex items-center justify-between">
          正在考试
          <div class="flex items-center gap-2">
            <icon-tips-one theme="outline" size="24" fill="#333" />
            考试时间20分钟，刷新页面生成新题
          </div>
        </div>
      </HdCard>
      <HdCard class="col-span-8 mb-5 relative" v-for="(question, index) of questions" :key="question.id">
        <div class="rounded-full">
          第
          <div class="w-5 h-5 rounded-full bg-[#16a085] text-white font-bold inline-flex justify-center items-center">
            {{ index + 1 }}
          </div>
          题
        </div>
        <HdMarkdownPreview :text="question.html" />
        <section class="flex flex-col gap-2 mt-3">
          <div class="mt-3 font-bold opacity-90">请选择正确答案</div>
          <div class="flex gap-2" v-for="(item, index) of question.lists" :key="index">
            <el-checkbox-group v-model="question.answer" size="large">
              <el-checkbox :label="index" border @change="changeSelect(question, index)"> 选择 </el-checkbox>
            </el-checkbox-group>
            <div class="border border-gray-100 bg-gray-100 flex-1 flex items-center px-3 opacity-90">
              {{ item.title }}
            </div>
          </div>
        </section>
      </HdCard>
      <div class="flex justify-center py-3 bg-white rounded-lg">
        <el-button type="danger" size="large" @click="submit">交卷</el-button>
      </div>
    </section>
  </main>
</template>
