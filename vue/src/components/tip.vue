<script setup lang="ts">
const { config } = useConfigStore()
</script>

<template>
  <HdCard v-if="config">
    <template #header> 社区小贴 </template>
    <template #default>
      <div class="mb-3 font-normal text-center text-base opacity-90" v-html="config.base.tip"></div>
    </template>
    <template #footer>
      <div class="flex items-center gap-2 justify-center">
        <router-link :to="{ name: 'topic.create' }">
          <el-button type="primary" size="default" plain> 发贴交流 </el-button>
        </router-link>
        <router-link :to="{ name: 'sign' }">
          <el-button type="success" size="default" plain> 签到打卡 </el-button>
        </router-link>
      </div>
    </template>
  </HdCard>
</template>

<style lang="scss"></style>
