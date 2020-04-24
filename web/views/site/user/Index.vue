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
  </div>
</template>

<script>
import User from '@/components/User'

export default {
  components: { User }
}
</script>

<style scoped></style>
