<script setup lang="ts">
import Email from './bind/email.vue'
import Mobile from './bind/mobile.vue'
import wechat from './bind/wechat.vue'
const tab = ref('wechat')
// const { user } = useUserStore()
// const isBind = user?.email && user?.openid
</script>

<template>
  <main>
    <!-- <div v-if="!isBind" class="border py-2 px-3 bg-gray-100 rounded-md text-gray-500 text-sm opacity-80">
      请绑定手机和微信，这可以让你在电脑端与微信公众号【后盾云】拥有更好的学习体验
    </div> -->
    <!-- <el-alert
      title="请绑定手机和微信后再体验网站"
      type="warning"
      effect="light"
      show-icon
      closable
      class="mb-2"
      v-if="!isBind" /> -->
    <el-tabs v-model="tab" type="card" tab-position="top" class="mt-2">
      <el-tab-pane label="微信绑定" name="wechat">
        <wechat v-if="tab == 'wechat'" />
      </el-tab-pane>
      <el-tab-pane label="手机绑定" name="mobile">
        <mobile />
      </el-tab-pane>
      <el-tab-pane label="邮箱绑定" name="email">
        <email />
      </el-tab-pane>
    </el-tabs>
  </main>
</template>

<style lang="scss"></style>
