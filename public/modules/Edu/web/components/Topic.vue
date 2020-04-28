<template>
  <div class="d-flex pt-3 pb-3 border-top align-items-center">
    <router-link :to="{name:'center',params:{id:topic.user.id}}">
      <a-avatar :src="topic.user.avatar" class="mr-3" shape="square" />
    </router-link>
    <div class="d-flex flex-column justify-content-between">
      <router-link
        :to="{ name: 'topic.show', params: { id: topic.id } }"
        class="text-secondary"
      >{{topic.title}}</router-link>
      <span class="small text-black-50">
        {{ topic.user.name }} . 发表于{{ topic.created_at | dateFormat('now') }} .
        {{ topic.comment_count }}条评论
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props: { topic: { type: Object } }
}
</script>

<style>
</style>
