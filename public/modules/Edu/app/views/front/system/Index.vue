<template>
  <div class="container mt-5 bg-white border shadow-sm pb-5 pt-4">
    <div class="card bg-white border-0">
      <div class="card-header bg-white d-block h-100">
        <h5 class="text-secondary mt-2">系统学习</h5>
        <p class="text-secondary">通过系统课程全面掌握一门语言或软件的使用，尤其适合刚入门的新手系统牢固的掌握知识。</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-4" v-for="lesson in lessons" :key="lesson.id">
            <router-link to="/">
              <div class="card">
                <img src="http://localhost:3000/images/member-login.jpg" />
                <div
                  class="card-footer bg-white p-4 text-muted d-flex justify-content-center"
                >{{lesson.title}}</div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lessons: null
    }
  },
  async created() {
    let response = await this.axios.get(`edu/front/system`)
    this.$set(this, 'lessons', response.data)
  }
}
</script>

<style lang="scss" scoped>
img {
  width: 100%;
}
</style>

