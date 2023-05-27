<script setup lang="ts">
import SignSubmit from './components/sign-submit.vue'
import UserAvatar from '@/components/userAvatar.vue'
import dayjs from 'dayjs'
const { authorize } = useAuth()
const { collection, getTodaySignList, todaySign, remove } = useSign()
await getTodaySignList()

const icon = (name: string) => {
  return new URL(`../../../public/sign/${name}.gif`, import.meta.url).href
}

const wechatInput = new URL(`../../../public/wechat/input.jpg`, import.meta.url).href
</script>

<template>
  <main class="sign">
    <HdCard v-if="todaySign">
      <template #header> 签到快乐，再接再厉 </template>
      <div class="leading-8">
        您上次签到时间: {{ dayjs(todaySign.created_at).format('YYYY-MM-DD HH:mm') }} <br />
        您的总签到天数: {{ todaySign.sign_count?.total }} 天 <br />
        您本月签到天数: {{ todaySign.sign_count?.month }} 天
      </div>
    </HdCard>
    <SignSubmit v-else />
    <hdCard class="my-5">
      <template #header>微信快签</template>
      <section>
        使用微信签到更快，微信搜索 <span class="text-orange-500 font-bold">houdunren2022</span> 关注【后盾云】公众号，
        <!-- 扫码下方二维码或微信搜索【后盾云】添加公众号 <br /> -->
        <!-- <el-image src="/assets/wechat/qr.jpg" fit="fill" :lazy="true"></el-image> <br /> -->
        发送以『签到』开始的的内容。 <br />
        <el-image :src="wechatInput" fit="fill" :lazy="true" class="w-full md:max-w-[400px]"></el-image>
        <br />
        2022年10月18日前注册的老朋友，请先在电脑端绑定微信后再使用微信快签功能，否则使用微信公众号进行微信快签会创建一个新用户。
      </section>
    </hdCard>
    <hdCard class="my-5">
      <template #header>早起少年</template>

      <section>
        早上5:00~7.30签到， 并设置了
        <router-link to="/member" class="text-teal-700">收货地址</router-link>
        和
        <router-link to="/member" class="text-teal-700">手机号</router-link>，即可参加
        <router-link :to="{ name: 'morning' }" class="text-teal-700">【早起少年】</router-link>
        活动， 并有机会得到礼品。
      </section>
    </hdCard>
    <HdCard v-if="collection?.length">
      <template #header> 今日签到排行 </template>
      <div class="text-base">
        <el-table
          :data="collection"
          border
          stripe
          size="large"
          header-cell-class-name="text-sm"
          cell-class-name="text-sm py-4 text-center text-gray-600 "
          class="hidden md:flex">
          <el-table-column label="签到的朋友" :width="200" #default="{ row }" align="left">
            <div class="flex justify-start gap-2 items-center">
              <UserAvatar :user="row.user" />
              <router-link :to="{ name: 'sign.space', params: { uid: row.user.id } }">
                {{ row.user.name }}
              </router-link>
            </div>
          </el-table-column>
          <el-table-column label="签到时间" :width="100" #default="{ row }" align="center">
            {{ dayjs(row.created_at).format('HH:mm') }}
          </el-table-column>
          <el-table-column label="月签到天数" :width="120" #default="{ row }" align="center">
            {{ row.sign_count?.month }}
          </el-table-column>
          <el-table-column label="总签到天数" :width="120" #default="{ row }" align="center">
            {{ row.sign_count?.total }}
          </el-table-column>
          <el-table-column label="签到心情" #default="{ row }">
            <div class="flex items-center">
              <el-image class="w-12 h-12 box-content p-1" :src="icon(row.mood)" fit="cover" :lazy="true" />
              {{ row.content }}
              <el-button
                type="warning"
                size="small"
                plain
                @click="remove(+row.id)"
                v-if="authorize(row.user.id)"
                class="ml-2">
                删除
              </el-button>
            </div>
          </el-table-column>
        </el-table>
        <!-- 移动端显示 -->
        <div class="md:hidden border-b py-3" v-for="item of collection" :key="item.id">
          <div class="flex">
            <UserAvatar :user="item.user" class="mr-2" />
            <div class="flex flex-col justify-between">
              {{ item.content }}
              <el-button type="warning" size="small" plain @click="remove(+item.id)" v-if="authorize(item.user.id)">
                删除
              </el-button>
              <div class="text-xs text-gray-600 flex items-center gap-1 align-top">
                <router-link
                  :to="{ name: 'sign.space', query: { uid: item.user_id } }"
                  class="text-indigo-800 font-bold opacity-70">
                  {{ item.user.name }}
                </router-link>
                <span>{{ dayjs(item.created_at).fromNow() }}</span>
                <span class="align-top inline-block">.</span>
                <span>总签到 {{ item.sign_count?.total }} 天</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </HdCard>
  </main>
</template>
