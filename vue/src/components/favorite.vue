<script setup lang="ts">
const { model, id } = defineProps<{
  model: string
  id: any
}>()

const { toggleFavorite, favorite, find } = useFavorite()
const { isLogin } = useAuth()
if (isLogin()) find(model, id)
</script>

<template>
  <main v-if="favorite" @click="toggleFavorite(model, id)">
    <!-- <el-button type="danger" size="small" v-if="favorite.state" v-bind="$attrs">
      <icon-like theme="filled" class="mr-1 text-yellow-100" />
      已收藏
    </el-button>

    <el-button plain type="info" size="small" v-else v-bind="$attrs">
      <icon-like theme="outline" class="mr-1" />收藏
    </el-button> -->
  </main>
</template>
