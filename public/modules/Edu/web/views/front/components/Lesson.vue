<template>
  <router-link :to="{ name: 'lesson.show', params: { id: lesson.id } }" class="d-block shadow-sm">
    <div class="card">
      <div class="card-body p-0">
        <img :src="lesson.thumb" />
      </div>
      <div class="card-body lesson-title">{{ lesson.title }}</div>
      <div class="card-footer d-flex justify-content-between text-secondary small bg-light">
        <span>开始学习</span>
        <span>
          <i class="fa fa-film ml-3" aria-hidden="true"></i>
          {{ lesson.video_count }}节课
        </span>
      </div>
    </div>
  </router-link>
</template>

<script>
export default {
  props: {
    lesson: { type: Object }
  }
}
</script>

<style scoped>
img {
  height: 211px;
}
</style>
