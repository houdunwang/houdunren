<script setup lang="ts">
import Pagination from '@/components/pagination.vue'
import Tip from '@/components/tip.vue'
// import { http } from '@/plugins/axios'

const route = useRoute()
const page = ref(+(route.query.page || 1))
const { collection: activityCollection, findAll } = useActivity()
const { getRecommendList } = useTopic()
const [recommendTopics] = await Promise.all([getRecommendList(), findAll(page.value)])
const {
  config: { site },
} = useConfigStore()

// const res = await http.request({
//   url: `b`,
// })
// alert(res)
// const { isWechat } = useUtil()
// const { user } = useUserStore()
// if (isWechat() && !user?.openid) {
//   location.href = '/wechat/appLogin'
// }
</script>

<template>
  <div>
    <div
      class="mb-3 px-3 py-2 rounded-md bg-[#FDF6EC] text-sm text-[#E6A23C] flex items-center gap-2 site-notice"
      v-if="site?.base.notice">
      <icon-info theme="filled" size="15" />
      <div v-html="site.base.notice"></div>
    </div>
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

<style lang="scss" scoped>
:deep(.site-notice) {
  a {
    color: #ff8066 !important;
    &:hover {
      color: #ff9671;
    }
  }
}
</style>
