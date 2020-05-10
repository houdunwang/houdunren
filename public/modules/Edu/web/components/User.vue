<template>
  <div class="card rounded shadow-sm">
    <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
      <router-link
        :to="{ name: 'center.topic', params: { id: user.id } }"
        class="mt-3 d-flex flex-column align-items-center"
      >
        <a-avatar :src="user.avatar" :size="90" class="border" />
        <span class="text-secondary mt-2">{{user.name}}</span>
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
    <div class="text-center pb-3" v-if="fansBtn">
      <a
        href="#"
        class="btn btn-sm"
        :class="user.is_follower ? 'btn-success' : 'btn-outline-success'"
        data-container="body"
        data-toggle="popover"
        data-placement="top"
        data-trigger="hover"
        data-original-title
        title
        @click.prevent="follower"
      >
        <i class="fa fa-plus"></i>
        关注 TA
      </a>
      <a
        href="#"
        class="btn btn-sm"
        :class="user.is_favour ? 'btn-info' : 'btn-outline-info'"
        data-container="body"
        data-toggle="popover"
        data-placement="top"
        data-trigger="hover"
        data-content="收到 0 个赞"
        data-original-title
        title
        @click.prevent="favour"
      >
        <i class="fa fa-heart-o"></i> 点个赞呗
      </a>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  //id || user 二选一
  props: { id: [Number, String], fansBtn: { type: Boolean, default: true } },
  data() {
    return {
      user: {}
    }
  },
  computed: {
    ...mapState('user', { auth: 'user' })
  },
  async created() {
    let idParams = this.auth.id ? `id=${this.auth.id}` : ''
    let response = await this.axios.get(`edu/front/user/${this.id}?${idParams}`)
    this.$set(this, 'user', response.data)
  },
  methods: {
    async follower() {
      if (!this.auth.id) {
        this.$message.error('请登录后操作')
      } else {
        let response = await this.axios.get(`edu/front/user/follower/${this.id}`)
        this.$set(this, 'user', response.data)
      }
    },
    async favour() {
      if (!this.auth.id) {
        this.$message.error('请登录后操作')
      } else {
        let response = await this.axios.get(`edu/front/user/favour/${this.id}`)
        this.$set(this, 'user', response.data)
      }
    }
  }
}
</script>

<style></style>
