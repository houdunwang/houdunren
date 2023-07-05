<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'
import dayjs from 'dayjs'
import { ElMessage, ElMessageBox } from 'element-plus'
const route = useRoute()
const { request, scrollTo } = useUtil()
const { authorize, isLogin } = useAuth()
const { add, remove } = useComment()
const { collection, comment, model, mid } = defineProps<{
  model: string
  mid: number
  collection: CommentModel[]
  comment: CommentModel
}>()
//表单数据
const form = reactive({ content: '', comment_id: comment.comment_id || comment.id, reply_user_id: comment.user_id })
//显示文本框DIV
const showInput = ref(false)
//发布
const onSubmit = request(async () => {
  if (!form.content.trim()) {
    return ElMessage.error('评论内容不能为空')
  }
  const comment = await add(model, mid, form)
  collection.find((c) => c.id == form.comment_id)?.replys.push(comment)
  showInput.value = false
  form.content = ''
  //滚动到新评论
  nextTick(() => {
    scrollTo(document.querySelector(`#comment${comment.id}`) as HTMLDivElement)
  })
})

//跳转到评论
nextTick(() => {
  const id = +route.query.commentId!
  if (id == comment.id) {
    scrollTo(document.querySelector(`#comment${id}`) as HTMLDivElement)
  }
})

const del = async (e: MouseEvent) => {
  await ElMessageBox.confirm('确定删除评论吗？')
  await remove(comment.id)
  const el = document.querySelector(`#comment${comment.id}`) as HTMLDivElement
  el.style.display = 'none'
}
</script>

<template>
  <section class="mb-3 overflow-hidden" :id="`comment${comment.id}`">
    <div class="flex items-center justify-between py-3 px-5 bg-white border border-gray-100 border-l border-r">
      <div class="flex gap-2">
        <UserAvatar :user="comment.user" class="w-9 h-9" />
        <div class="flex flex-col justify-start">
          <div class="flex text-sm font-bold text-gray-500 mb-1">
            <router-link :to="{ name: 'sign.space', query: { uid: comment.user_id } }">
              {{ comment.user.nickname }}
            </router-link>
            <div v-if="comment.comment_id" class="flex items-center">
              <icon-right theme="outline" />
              <router-link :to="{ name: 'sign.space', query: { uid: comment.reply_user_id } }">
                {{ comment.reply_user.nickname }}
              </router-link>
            </div>
          </div>
          <div class="text-gray-700 flex items-center gap-3 text-xs">
            <div class="flex items-center gap-1">
              <icon-time theme="outline" /> {{ dayjs(comment.created_at).fromNow() }}
            </div>
            <a
              href="javascript:void(0)"
              class="flex items-center gap-1 cursor-pointer"
              @click="showInput = !showInput"
              v-if="isLogin()">
              <icon-share-two theme="outline" /> 回复 #{{ comment.id }}
            </a>
          </div>
        </div>
      </div>
      <span
        class="cursor-pointer text-gray-600 hover:text-red-600 text-xs"
        @click="del"
        v-if="authorize(comment.user_id)">
        <icon-delete theme="outline" />
      </span>
    </div>
    <div
      class="flex flex-col justify-between px-5 opacity-90 border-l border-r border-b border-gray-100 bg-gray-50 comment-content">
      <ImagePreview>
        <HdMarkdownPreview :text="comment.html" />
      </ImagePreview>
    </div>
    <div class="p-5 border-t border-gray-100 py-3 input" v-show="showInput">
      <el-input v-model="form.content" :rows="5" type="textarea" placeholder="支持markdown语法" />
      <HdError name="content" />
      <el-button type="primary" size="default" @click="onSubmit" class="mt-2">发表</el-button>
    </div>
    <slot />
  </section>
</template>

<style lang="scss" scoped>
.comment-content {
  :deep(pre) {
    @apply md:-mx-5;
    code {
      @apply px-5;
    }
  }
}
</style>
