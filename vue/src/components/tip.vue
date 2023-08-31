<script setup lang="ts">
const {
  config: { site },
} = useConfigStore()
const { open } = useUtil()
</script>

<template>
  <HdCard v-if="site">
    <template #header> 社区小贴 </template>
    <template #default>
      <div class="font-normal text-center text-base opacity-90" v-html="site.base.tip"></div>
    </template>
    <template #footer>
      <div class="flex items-center gap-2 justify-center">
        <router-link :to="{ name: 'topic.create' }">
          <el-button type="primary" size="default" plain> 发贴交流 </el-button>
        </router-link>
        <router-link :to="{ name: 'sign' }">
          <el-button type="success" size="default" plain> 签到打卡 </el-button>
        </router-link>
        <el-button type="warning" size="default" plain @click="open('https://doc.houdunren.com', '_blank')">
          在线文档
        </el-button>
      </div>
    </template>
  </HdCard>
</template>

<style lang="scss"></style>
