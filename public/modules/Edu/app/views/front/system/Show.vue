<template>
  <div v-if="field">
    <div class="container mt-5 border shadow-sm p-5 bg-white">
      <h4 class="text-secondary mb-3">{{field.title}}</h4>
      <div
        class="small text-secondary mb-4"
      >创建于{{field.created_at | dateFormat('now')}}个月前 / 更新于{{field.updated_at | dateFormat('now')}}个月前</div>
      <div class="bg-light p-3 text-secondary">{{ field.description }}</div>
    </div>
    <div class="container bg-white border shadow-sm p-5 mt-2" v-if="lessons.length==0">
      <div class="text-center text-secondary">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        即将更新
      </div>
    </div>
    <div class="container bg-white border shadow-sm p-5 mt-2" v-if="lessons.length>0">
      <h5 class="text-secondary mb-3">课程列表</h5>
      <div
        class="border-top pt-3 pb-2 mb-2 d-flex justify-content-between text-secondary"
        v-for="lesson in lessons"
        :key="lesson.id"
      >
        <router-link :to="{name:'lesson.show',params:{id:lesson.id}}">{{lesson.title}}</router-link>
        <div class="small text-secondary">
          <i class="fa fa-video-camera" aria-hidden="true"></i>
          共有 {{ lesson.video.length }} 个视频
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      field: null,
      lessons: []
    }
  },
  async created() {
    let response = await this.axios.get(`edu/front/system/${this.$route.params.id}`)
    this.$set(this, 'field', response.data.data)
    this.$set(this, 'lessons', response.data.meta.lessons)
  }
}
</script>

<style>
</style>
