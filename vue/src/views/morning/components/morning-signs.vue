<script setup lang="ts">
const route = useRoute()
const { getSignUsers, signUsers } = useMorning()
const page = ref(route.query.page || 1)
await getSignUsers(page.value)
</script>

<template>
  <HdCard>
    <template #header>
      <div class="flex justify-between items-center">
        早起少年榜
        <span class="font-light">以下朋友有机会获得礼品</span>
      </div>
    </template>
    <div class="flex gap-2 flex-wrap items-center" v-if="signUsers?.data.length">
      <router-link
        :to="{ name: 'sign.space', query: { uid: user.id } }"
        v-for="user of signUsers.data"
        :key="user.id"
        class="flex flex-col justify-center gap-2 items-center border w-16">
        <UserAvatar :user="user" fit="cover" :lazy="true" class="w-16 h-16 cursor-pointer flex-shrink-0" />
        <span class="text-xs px-2 pb-2 truncate w-16 text-center block">{{ user.nickname }}</span>
      </router-link>
    </div>
    <div class="p-3 text-center" v-else>还没有朋友达到2天签到的记录</div>
    <div class="mt-5" v-if="signUsers?.data.length">
      <el-pagination
        v-if="signUsers"
        @current-change="getSignUsers($event)"
        layout="prev, pager"
        :hide-on-single-page="true"
        :pager-count="5"
        :page-size="signUsers.meta.per_page"
        :total="signUsers.meta.total"
        background />
    </div>
    <template #footer>
      <div class="text-center text-gray-600">
        如果你已经签到两天了，但没有你的数据，应该是没有设置
        <a href="/member" class="text-[#16a085]">收货地址</a>
        和
        <a href="/member" class="text-[#16a085]">手机号</a>
      </div>
    </template>
  </HdCard>
</template>
