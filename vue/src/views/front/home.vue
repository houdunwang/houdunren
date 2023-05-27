<script setup lang="ts">
import ActivityItem from '@/components/activity-item.vue'
import Pagination from '@/components/pagination.vue'
import Tip from '@/components/tip.vue'
import TopicItem from '@/components/topic-item.vue'
import WechatGroup from '@/components/wechat-group.vue'

const route = useRoute()
const page = ref(+(route.query.page || 1))
const { collection: activityCollection, findAll } = useActivity()
const { getRecommendList } = useTopic()
const [recommendTopics] = await Promise.all([getRecommendList(), findAll(page.value)])
</script>

<template>
  <div class="">
    <el-alert
      title="新版网站更新了，如果发现问题请发个贴子说明，我会尽快修复"
      type="warning"
      show-icon
      :closable="false"
      class="!mb-3"></el-alert>

    <main class="lg:grid lg:grid-cols-12 grid-flow-row gap-3 items-start">
      <section class="lg:col-span-9">
        <HdCard>
          <template #header> 社区动态 </template>
          <template #default>
            <section class="!-my-5">
              <section v-if="page == 1">
                <TopicItem v-for="topic of recommendTopics" :key="topic.id" :item="topic" />
              </section>
              <section>
                <ActivityItem v-for="item of activityCollection.data" :key="item.id" :item="item" />
              </section>
            </section>
          </template>
        </HdCard>
        <Pagination
          :per_page="activityCollection.meta.per_page"
          :total="activityCollection.meta.total"
          @current-change="$router.push({ name: 'home', query: { page: $event } })" />
      </section>

      <section class="lg:w-full lg:col-span-3">
        <Tip />
        <VideoLearnDynamic class="mt-3" />
        <WechatGroup class="mt-3" />
      </section>
    </main>
  </div>
</template>
