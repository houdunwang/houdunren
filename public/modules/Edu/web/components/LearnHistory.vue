<template>
  <div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white text-muted">
      <i class="fa fa-check-circle-o mr-1" aria-hidden="true"></i>
      学习动态
    </div>
    <div class="list-group list-group-flush">
      <div class="list-group-item" v-for="field in logs" :key="field.id">
        <div class="row">
          <div class="col-sm-3 col-3 pr-0">
            <router-link :to="{name:'center',params:{id:field.user.id}}">
              <a-avatar :size="35" :src="field.user.avatar" class="mr-3"></a-avatar>
            </router-link>
          </div>
          <div class="col-sm-9 col-9 pl-0">
            <router-link
              :to="{ name: 'video.show', params: {  id: field.video.id } }"
              class="d-flex justify-content-between d-block mb-1"
            >{{field.video.title}}</router-link>
            <div class="small text-black-50">
              {{ field.user.name }}
              <i class="fa fa-clock-o"></i>
              {{ field.updated_at | dateFormat }}
            </div>
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
      logs: []
    }
  },
  async created() {
    let response = await this.axios.get(`edu/front/user/learn_history`)
    this.$set(this, 'logs', response.data)
  }
}
</script>

<style>
</style>
