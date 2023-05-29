<script setup lang="ts">
import QuestionRankTotal from '@/components/question-rank-total.vue'
import useUtil from '@/composables/hd/useUtil'
import dayjs from 'dayjs'
import Layout from './layout.vue'
import UserAvatar from '@/components/userAvatar.vue'

const { open } = useUtil()
const { getRankingList } = useQuestionAnswer()
const rankList = await getRankingList()
</script>

<template>
  <Layout>
    <main class="lg:grid grid-cols-12 gap-5">
      <section class="col-span-9 mb-5">
        <HdCard class="">
          <template #header>
            <section class="flex justify-between items-end">每日一考</section>
          </template>
          <template #default>
            <div class="leading-7">
              <span class="font-bold">考试说明:</span> <br />
              每天只能考试一次，进入考场即生成记录<br />
              考试时间20分钟，可以提前交卷 <br />
              退出考场后，20分钟内可以再进入考场<br />
              祝你成为今天第一名
            </div>
            <el-button type="primary" size="large" @click="open({ name: 'question.answer.index' })" class="mt-3">
              进入考场
            </el-button>
            <div class="flex items-center gap-2 bg-gray-50 mt-3 p-3 border border-gray-200 rounded-md">
              <icon-tips-one theme="outline" size="24" fill="#333" />
              功能测试期，测试完毕后会给成绩优秀的朋友送个小礼品，对你认真学习的态度，以示鼓励
            </div>
          </template>
        </HdCard>
        <HdCard class="mb-5 mt-5">
          <template #header>
            <section class="flex justify-between items-end">
              今日成绩榜单
              <div class="flex items-center gap-2 text-sm">
                <icon-tips-one theme="outline" size="18" fill="#333" />
                相同分数的成绩，用时少的排名靠前
              </div>
            </section>
          </template>

          <el-table
            :data="rankList"
            border
            stripe
            size="large"
            header-cell-class-name="text-base"
            cell-class-name="text-base py-4 text-center text-gray-600 "
            class="hidden md:flex">
            <el-table-column label="排名" #default="{ $index }" align="center" width="150">
              <div v-if="$index == 0" class="flex items-center justify-center">
                <icon-gold-medal theme="outline" size="35" fill="#e67e22" />
              </div>
              <template v-else>第{{ $index + 1 }}名</template>
            </el-table-column>
            <el-table-column label="同学" #default="{ row }" align="left">
              <div class="flex justify-start gap-2 items-center">
                <UserAvatar :user="row.user" />
                <router-link :to="{ name: 'sign.space', params: { uid: row.user.id } }">
                  {{ row.user.nickname }}
                </router-link>
              </div>
            </el-table-column>
            <el-table-column label="成绩" #default="{ row }" align="center"> {{ row.mark }} 分 </el-table-column>
            <el-table-column label="考试时间" #default="{ row }" align="center">
              {{ dayjs(row.created_at).format('HH:mm') }}
            </el-table-column>
            <el-table-column label="用时" #default="{ row }" align="center">
              {{ dayjs(row.updated_at).diff(row.created_at, 'minute') }}分钟
            </el-table-column>
          </el-table>
        </HdCard>
      </section>
      <section class="col-span-3">
        <HdCard class="">
          <template #header>出个题吧</template>
          <section>
            任何人的知识都是金贵的，你出的题一定有适合和喜欢的人群。 所以放心大胆的出题吧。
            <br />
            网站所有题来源于网友朋友，你出的每一道题，都会帮助到努力前进的少年。
          </section>
        </HdCard>
        <QuestionRankTotal class="mt-5" />
      </section>
    </main>
  </Layout>
</template>

<style lang="scss"></style>
