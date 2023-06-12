<script setup lang="ts">
import Email from './bind/email.vue'
import Mobile from './bind/mobile.vue'
import wechat from './bind/wechat.vue'
const tab = ref('mobile')
const { user } = useUserStore()
const isBind = user?.email || user?.mobile
</script>

<template>
  <main>
    <el-alert
      title="邮箱或手机号需要绑定一个"
      type="warning"
      effect="light"
      show-icon
      closable
      class="mb-2"
      v-if="!isBind" />
    <el-tabs v-model="tab" type="card" tab-position="top" class="mt-2">
      <el-tab-pane label="手机绑定" name="mobile">
        <mobile />
      </el-tab-pane>
      <el-tab-pane label="邮箱绑定" name="email">
        <email />
      </el-tab-pane>
      <el-tab-pane label="微信绑定" name="wechat">
        <wechat v-if="tab == 'wechat'" />
      </el-tab-pane>
    </el-tabs>
  </main>
</template>

<style lang="scss"></style>
