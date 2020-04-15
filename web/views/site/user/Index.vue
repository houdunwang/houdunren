<template>
  <div>
    <nav class="nav nav-tabs nav-stacked mb-3">
      <router-link :to="{name:'site'}" class="nav-link">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link
        :to="{name:'site.user',params:{sid:$route.params.sid}}"
        class="nav-link active"
        href="#"
        active
      >用户列表</router-link>
    </nav>
    <user :action="`site/${$route.params.sid}/user`" method="get" />
    <!-- <a-table :pagination="false" :dataSource="users" :columns="columns" rowKey="id">
      <div slot="avatar" slot-scope="user">
        <a-avatar size="small" :src="user.avatar" />
      </div>
      <div slot="created_at" slot-scope="user">{{ user.created_at |dateFormat('Y/M/D') }}</div>
    </a-table>-->
  </div>
</template>

<script>
import User from '@/components/User'

export default {
  components: { User },
  data() {
    return {
      //   users: [],
      //   columns
    }
  },
  async created() {
    // let response = await this.axios.get(`site/${this.$route.params.sid}/user`)
    // this.$set(this, 'users', response.data)
  }
}
</script>

<style scoped></style>
