<script setup lang="ts">
import dayjs from 'dayjs'
const { isLogin } = useAuth()
const { getLatest, model, luck } = useMorning()
await getLatest()

const user = ref<UserModel>()
const dialogState = ref(false)

//抽奖
const drawPrize = async () => {
  user.value = await luck()
  if (user.value.id) dialogState.value = true
}
</script>

<template>
  <main>
    <!-- 中礼品的用户 -->
    <el-dialog v-model="dialogState" width="28%" append-to-body>
      <div class="flex flex-col justify-center items-center" v-if="user">
        <UserAvatar :user="user" class="rounded-lg w-72 h-72" />
        <span class="text-lg px-2 pb-2 mt-3">
          <div>
            恭喜
            <router-link
              :to="{ name: 'sign.space', query: { uid: user.id } }"
              target="_blank"
              class="text-green-700 font-bold">
              {{ user.name }}
            </router-link>
            获取活动礼品
          </div>
          <div class="text-center">用户编号 {{ user.id }}</div>
        </span>
      </div>
    </el-dialog>
    <!-- 中礼品的用户 END-->

    <HdCard>
      <template #header>
        <section class="flex justify-between items-center">
          本期活动
          <el-button type="success" @click="drawPrize" class="ml-2" v-if="isLogin()"> 抽取幸运的朋友 </el-button>
        </section>
      </template>
      <section>
        <div class="pb-3" v-if="model.id">
          <div
            class="flex flex-col md:flex-row md:items-center justify-between"
            v-if="dayjs().diff(dayjs(model.end_time)) < 0">
            <div class="mb-3 md:mb-0">
              还有
              <span class="font-bold text-red-500">{{ dayjs(model.end_time).fromNow(true) }}</span>
              发放礼品。 会在当天
              <router-link :to="{ name: 'live' }" class="text-green-700">晚八点直播</router-link>
              时抽取并立即邮寄
            </div>
            <el-button type="primary" size="large" @click="$router.push({ name: 'sign' })"> 马上参与 </el-button>
          </div>
          <div class="text-lg text-gray-600" v-else>
            马上就要抽礼品了，记得来
            <router-link :to="{ name: 'live' }" class="font-bold text-green-700">晚八点直播间</router-link> 观看
          </div>

          <!-- 礼品展示 -->
          <div>
            <div class="flex flex-col gap-2 py-3 justify-start items-start">
              这次给早起朋友送的礼品：
              <a :href="model.url" target="_blank" class="text-green-600 inline-block w-72 overflow-hidden">
                <el-image :src="model.image" fit="cover" :lazy="true" class="w-full hover:scale-105 duration-300" />
              </a>
            </div>
            <div class="flex">
              <a :href="model.url" target="_blank" class="text-green-600">查看礼品的详细介绍</a>
            </div>
          </div>
          <!-- 礼品展示 END-->
        </div>
        <div class="font-bold text-red-600" v-else>活动马上开始...</div>
        <div class="border rounded-md p-5 mt-3">
          早起活动是为了让大家保持早睡早起的好习惯，健康的好身体是学习和工作的基础。
        </div>
      </section>
    </HdCard>

    <HdCard class="mt-3 leading-7">
      <div class="flex flex-col items-start gap-2">
        <div class="font-bold">活动说明：</div>
        <div class="">
          任何用户都可以参与活动，不需要任何消费 <br />
          每15天开启一个活动<br />
          要求早上5:00~7:30签到<br />
          每次活动周期内在网站签到2天（不要求连续签到，只要有2天就可以），即可参与抽取礼品<br />
          收货地址有效，且快递费用不超过20元(一般会选择京东免运费商品，所以问题不大)<br />
          每次活动送一位幸运的朋友礼品<br />
          网站拥有活动的一切权利，包括随时终止活动<br />
          礼品会选择可信赖的品牌，礼品问题需要自行联系商家售后<br />
          已经设置了真实的 <a href="/member" class="text-[#16a085] inline">收货地址</a>
          和
          <a href="/member" class="text-[#16a085] inline">手机号</a>
          否则无法邮寄<br />
          <div>抽中礼品的朋友加微信：houdunren2021，给你发订单截图</div>
        </div>

        <div class="flex flex-col items-start gap-2 mt-3">
          <div class="font-bold">活动要求：</div>
          为了证明活动的真实性，收到礼品的朋友需要录制个短视频（如果你不想露脸，也是可以的）<br />
          时长不限，几秒钟都可以 <br />
          这可以激励更多的人参与【早起少年】活动，拥有好身体，替早起受益的朋友向你表示感谢 <br />
          收到礼品，但没有录制视频的朋友，不能参与下次活动 <br />
          视频会放在平台，所以注意隐私信息<br />
          视频发微信：houdunren2021 <br />
          再次表示感谢，辛苦了兄弟姐妹
        </div>

        <div class="border bg-gray-100 p-3 mt-3">
          活动不需要朋友们出一分钱，只是为了我们有个好身体，是健康的正能量的
          <br />
          因为家境贫寒，希望兄弟姐妹们不要嫌弃礼品便宜
        </div>
      </div>
    </HdCard>
  </main>
</template>
