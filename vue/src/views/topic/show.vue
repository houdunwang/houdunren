<script setup lang="ts">
import CommentList from '@/components/comment-list.vue'
import { useTitle } from '@vueuse/core'
import dayjs from 'dayjs'

const { isAdministrator } = useUser()
const { user } = useUserStore()
const { params } = useRoute()
const router = useRouter()

const { findOne, model, remove, toggleRecommend } = useTopic()
await findOne(+params.id)
useTitle(model.value?.title)
</script>

<template>
  <main v-if="model">
    <section class="bg-white rounded-xl p-5 2xl:p-10 mb-5">
      <h1 class="text-2xl opacity-90 leading-snug">
        {{ model.title }}
      </h1>
      <div class="mt-5 text-sm opacity-90 flex flex-col md:flex-row items-stretch gap-3 border-b pb-6">
        <UserAvatar :user="model.user" />

        <div class="flex flex-col justify-between flex-1">
          <span class="font-bold">{{ model.user.name }}</span>
          <div class="flex flex-col md:flex-row md:items-center gap-3 justify-between">
            <div class="flex items-center gap-3">
              <div class="md:flex items-center gap-1 hidden">
                <icon-time theme="outline" />发表于{{ dayjs(model.created_at).fromNow() }}
              </div>
              <div class="flex items-center gap-1">
                <icon-history theme="outline" />
                更新于{{ dayjs(model.updated_at).fromNow() }}
                <Favorite model="Topic" :id="model.id" size="small" />
              </div>
            </div>
            <div class="flex items-center gap-2" v-if="isAdministrator() || model.user_id == user?.id">
              <div v-if="isAdministrator()">
                <el-button type="success" size="small" @click="toggleRecommend(model.id!)" v-if="model.recommend">
                  推荐
                </el-button>
                <el-button type="info" size="small" @click="toggleRecommend(model.id!)" v-else> 推荐 </el-button>
              </div>
              <el-button type="warning" size="small" @click="remove(model?.id!)"> 删除 </el-button>
              <el-button
                type="primary"
                size="small"
                class="!ml-0"
                @click="router.push({ name: 'topic.edit', params: { id: model?.id } })">
                修改
              </el-button>
            </div>
          </div>
        </div>
      </div>
      <section class="leading-7 mt-10 opacity-95 mb-5 topic-show">
        <ImagePreview>
          <HdMarkdownPreview :text="model.html" />
        </ImagePreview>
      </section>

      <section class="flex justify-center">
        <Favour model="Topic" :id="model.id" size="large" />
      </section>
    </section>

    <CommentList module="Edu" model="Topic" :id="model.id" />
  </main>
</template>

<style lang="scss" scoped>
.topic-show {
  :deep(pre) {
    @apply md:-mx-10;
    code {
      @apply px-10;
    }
  }
}
</style>
