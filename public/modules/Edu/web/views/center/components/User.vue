<template>
  <div class="card rounded shadow-sm">
    <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
      <router-link
        :to="{ name: 'center.topic', params: { id: user.id } }"
        class="mt-3 d-flex flex-column align-items-center"
      >
        <a-avatar :src="user.avatar" :size="90" class="border" />
        <span class="text-secondary mt-2">{{ user.name }}</span>
      </router-link>
    </div>
    <div class="card-body text-center">
      <a-popover class="mr-2">
        <template slot="content">{{ user.email ? user.email : '未设置' }}</template>
        <i class="fa fa-envelope" :class="{ 'text-info': user.email }" aria-hidden="true"></i>
      </a-popover>
      <a-popover class="mr-2">
        <template slot="content">{{ user.weibo ? user.weibo : '未设置' }}</template>
        <i class="fa fa-weibo" :class="{ 'text-info': user.weibo }" aria-hidden="true"></i>
      </a-popover>
      <a-popover class="mr-2">
        <template slot="content">{{ user.wechat ? user.wechat : '未设置' }}</template>
        <i class="fa fa-weixin" :class="{ 'text-info': user.wechat }" aria-hidden="true"></i>
      </a-popover>
      <a-popover class="mr-2">
        <template slot="content">{{ user.github ? user.github : '未设置' }}</template>
        <i class="fa fa-github" :class="{ 'text-info': user.github }" aria-hidden="true"></i>
      </a-popover>
      <a-popover class="mr-2">
        <template slot="content">{{ user.qq ? user.qq : '未设置' }}</template>
        <i class="fa fa-qq" :class="{ 'text-info': user.qq }" aria-hidden="true"></i>
      </a-popover>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  props: { user: Object },
  computed: {
    ...mapState('user', { auth: 'user' })
  }
}
</script>
