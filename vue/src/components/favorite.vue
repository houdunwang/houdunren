<script setup lang="ts">
const {
  model,
  id,
  size = 'default',
} = defineProps<{
  model: string
  id: any
  size?: 'default' | 'small'
}>()

const { toggleFavorite, favorite, find } = useFavorite()
const { isLogin } = useAuth()
if (isLogin()) find(model, id)
</script>

<template>
  <main v-if="favorite" @click="toggleFavorite(model, id)">
    <el-button type="danger" :size="size" v-if="favorite.state" v-bind="$attrs">
      <icon-like theme="filled" class="mr-1 text-yellow-100" />
      已收藏
    </el-button>

    <el-button plain type="info" :size="size" v-else v-bind="$attrs">
      <icon-like theme="outline" class="mr-1" />收藏
    </el-button>
  </main>
</template>
