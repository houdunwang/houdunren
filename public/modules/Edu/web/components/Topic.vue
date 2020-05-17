<template>
  <div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <router-link :to="{ name: 'center', params: { id: topic.user.id } }">
      <a-avatar :src="topic.user.avatar" :size="45" class="mr-3" shape="square" />
    </router-link>
    <div class="d-flex flex-column justify-content-between">
      <router-link :to="{ name: 'topic.show', params: { id: topic.id } }" class="text-secondary h5">{{
        topic.title
      }}</router-link>
      <span class="small text-black-50">
        <router-link :to="{ name: 'center', params: { id: topic.user.id } }">{{ topic.user.name }}</router-link>
        . 发表于{{ topic.created_at | dateFormat('now') }}
        <span>. 评论 {{ topic.comment_count }}</span>
        <span>. 点赞 {{ topic.favour_count }}</span>
        <span>. 收藏 {{ topic.favorite_count }}</span>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props: { topic: { type: Object } }
}
</script>

<style></style>
