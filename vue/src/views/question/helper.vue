<script setup lang="ts">
import Layout from './layout.vue'
</script>

<template>
  <Layout>
    <HdCard>
      <template #header>提交考题</template>
      <div>
        考题来源于网站的所有用户，大家不用考虑自己的编程能力，尽管放心大胆的出题。 <br />
        你提交到新考题，需要3个人点赞（审核考题）后，会进入题库，其TA 同学就可以用来考试了。
      </div>
      <template #footer>
        <el-button type="success" plain @click="$router.push({ name: 'question.create' })" class="!ml-0">
          马上出题
        </el-button>
      </template>
    </HdCard>

    <HdCard class="my-3">
      <template #header>审核（点赞）考题</template>
      如果你认为哪个考题出的不错，就给点个赞吧。这样就会进入题库，用于考试。
      <template #footer>
        <el-button type="danger" plain @click="$router.push({ name: 'question.examine' })" class="mt-3">
          审题入库
        </el-button>
      </template>
    </HdCard>
    <HdCard>
      <template #header> 参加考试 </template>
      网站所以用户都可以参加考试，不需要任何消费 <br />
      每天只能参加一次考试 <br />
      考试中途退出，成绩为0分 <br />
      考试超时，成绩为0分
      <template #footer>
        <el-button type="primary" plain @click="$router.push({ name: 'question' })" class="mt-3"> 进入考场 </el-button>
      </template>
    </HdCard>
  </Layout>
</template>

<style lang="scss" scoped>
h2 {
  @apply font-bold my-3;
  &:first-child {
    @apply mt-0;
  }
  &:nth-of-type(n + 2) {
    @apply mt-10;
  }
  & + div {
    @apply flex flex-col items-start gap-2 border p-5 rounded-sm;
  }
}
</style>
