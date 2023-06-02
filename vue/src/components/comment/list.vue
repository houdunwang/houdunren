<script setup lang="ts">
import { onBeforeRouteLeave } from 'vue-router'
const { request } = useUtil()
const { isLogin } = useAuth()
const { collection, findAll, add } = useComment()
const { model, id } = defineProps<{
  model: string
  id: number
}>()

await findAll(model, id)

const form = reactive({ content: '', key: 1 })

const onSubmit = request(async () => {
  const comment = await add(model, id, form)
  collection.value!.push(comment)
  nextTick(() => {
    document.querySelector(`#comment${comment.id}`)?.scrollIntoView({ block: 'start', behavior: 'smooth' })
    form.content = ''
    form.key++
  })
})

//滚动到评论框
const scrollToEditor = () => {
  ;(document.querySelector('#editor') as HTMLDivElement)?.scrollIntoView({ block: 'start', behavior: 'smooth' })
}

//离开时将评价图标隐藏
const commentIcon = ref(true)
onBeforeRouteLeave(() => {
  commentIcon.value = false
})
</script>

<template>
  <HdCard class="col-span-8 mb-5">
    <!-- 跳转到评论框的图标 -->
    <Teleport to="body">
      <div
        class="fixed py-2 flex justify-center items-center bottom-[280px] right-5 cursor-pointer"
        @click="scrollToEditor"
        v-if="commentIcon">
        <icon-comment theme="filled" size="40" fill="#574b90" />
      </div>
    </Teleport>
    <!-- 跳转到评论框的图标 END-->
    <template #header> <slot name="header">讨论</slot> </template>
    <div v-if="collection">
      <CommentItem
        v-for="comment of collection"
        :key="comment.id"
        class="mb-3"
        :comment="comment"
        :collection="collection"
        :model="model"
        :mid="id"
        :id="`comment${comment.id}`">
        <div class="border-t" v-show="comment.replys.length">
          <CommentItem
            v-for="reply of comment.replys"
            :key="reply.id"
            :comment="reply"
            :collection="collection"
            :model="model"
            :mid="id"
            :id="`comment${reply.id}`"
            class="ml-10 my-2 bg-gray-50" />
        </div>
      </CommentItem>
    </div>
    <div id="editor">
      <section v-if="isLogin()" class="mt-5">
        <HdMarkdownEditor v-model="form.content" :height="300" :key="form.key" />
        <el-button type="primary" size="default" @click="onSubmit" class="mt-5">发表评论</el-button>
      </section>
      <section v-else class="flex justify-center mt-5 border py-5 rounded-md">
        <el-button type="success" size="large" @click="$router.push({ name: 'login' })">请登录后发表评论</el-button>
      </section>
    </div>
  </HdCard>
</template>
