<script setup lang="ts">
const { update } = useConfig()
const { config } = useConfigStore()
const tab = ref('subscribe')
</script>

<template>
  <HdCard>
    <template #header> 网站配置 </template>
    <template #default>
      <el-tabs v-model="tab" type="card" tab-position="top" class="p-5" v-if="config">
        <el-tab-pane label="订阅" name="subscribe">
          <el-form label-width="80px" :inline="false" size="large" label-position="top" class="border p-5">
            <el-form-item label="年会员">
              <el-input v-model="config.subscribe.price_year" />
            </el-form-item>
            <el-form-item label="永久会员">
              <el-input v-model="config.subscribe.price_permanent" />
            </el-form-item>
          </el-form>
        </el-tab-pane>
      </el-tabs>
    </template>

    <template #footer>
      <el-button type="primary" size="default" @click="update" class="mx-5 mb-5">保存提交</el-button>
    </template>
  </HdCard>
</template>
