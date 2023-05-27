<script setup lang="ts">
const { model, id, showAvatar } = withDefaults(
  defineProps<{
    model: string
    id: number
    showAvatar?: boolean
  }>(),
  { showAvatar: true },
)
const { toggleFavour, favour, getFavourInfo } = useFavour()
getFavourInfo(model, id)
</script>

<template>
  <main v-if="favour">
    <section class="flex gap-1 justify-center">
      <el-button type="success" size="default" @click="toggleFavour(model, id)" v-if="favour.state" v-bind="$attrs">
        <icon-good-two theme="filled" class="mr-1 text-yellow-100" />
        感谢 <span class="font-bold px-1">{{ favour.total }}</span> 个朋友的点赞
      </el-button>
      <el-button plain type="info" size="" @click="toggleFavour(model, id)" v-else v-bind="$attrs">
        <div v-if="favour.total" class="flex items-center">
          <icon-good-two theme="outline" class="mr-1" />已有{{ favour.total }}个朋友点赞
        </div>
        <div v-else class="flex items-center"><icon-good-two theme="outline" class="mr-1" />点个赞吧/鼓励一下吧</div>
      </el-button>
    </section>
    <section class="flex justify-center flex-wrap w-5/6 m-auto gap-2 mt-5" v-if="showAvatar">
      <UserAvatar v-for="user of favour.users" :key="user.id" :user="user" class="rounded-full" />
    </section>
  </main>
</template>
