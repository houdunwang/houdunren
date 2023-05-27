<script setup lang="ts"></script>

<template>
  <main class="2xl:w-page m-auto mt-10 p-2">
    <div class="flex justify-between border-gray-200 bg-white mb-3 px-5 py-3 rounded-md">
      <section class="">
        <el-button
          type="danger"
          :plain="$route.name != 'question.examine'"
          @click="$router.push({ name: 'question.examine' })">
          待审考题
        </el-button>
        <el-button
          type="primary"
          :plain="$route.name != 'question.all_question'"
          @click="$router.push({ name: 'question.all_question' })">
          全部考题
        </el-button>
        <el-button
          type="success"
          :plain="$route.name != 'question.create'"
          @click="$router.push({ name: 'question.create' })">
          我要出题
        </el-button>
        <el-button type="success" :plain="$route.name != 'question.my'" @click="$router.push({ name: 'question.my' })">
          我出的题
        </el-button>
        <el-button
          type="warning"
          :plain="$route.name != 'question.answer.my_answer_list'"
          @click="$router.push({ name: 'question.answer.my_answer_list' })">
          历史考卷
        </el-button>
        <el-button
          type="info"
          :plain="$route.name != 'question.helper'"
          @click="$router.push({ name: 'question.helper' })">
          帮助文档
        </el-button>
      </section>
      <div class="flex items-center gap-2" v-if="$slots.tip">
        <icon-tips-one theme="outline" size="24" fill="#333" />
        <slot name="tip" />
      </div>
    </div>
    <slot />
  </main>
</template>

<style lang="scss"></style>
