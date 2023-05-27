<script setup lang="ts">
const { update, all } = useConfig()
const config = ref(await all())
const tab = ref('base')
</script>

<template>
  <main class="bg-white p-5 rounded-lg" v-if="config">
    <el-form label-width="80px" label-position="top">
      <el-tabs v-model="tab" type="card" tab-position="top">
        <el-tab-pane label="基本配置" name="base" class="border p-3 rounded-md">
          <el-form-item label="网站名称">
            <el-input rows="5" v-model="config.name" placeholder="顶部导航等使用的网站名称" />
          </el-form-item>
          <el-form-item label="联系微信">
            <el-input v-model="config.copyright.weixin"></el-input>
          </el-form-item>
          <el-form-item label="联系邮箱">
            <el-input v-model="config.copyright.email"></el-input>
          </el-form-item>
          <el-form-item label="其他信息">
            <el-input v-model="config.copyright.other"></el-input>
          </el-form-item>
          <el-form-item label="icp">
            <el-input v-model="config.copyright.icp"></el-input>
          </el-form-item>
        </el-tab-pane>
        <el-tab-pane label="其他资料" name="other" class="border p-3 rounded-md">
          <el-form-item label="广告语">
            <el-input v-model="config.copyright.ad"></el-input>
          </el-form-item>
          <el-form-item label="社区小贴">
            <el-input type="textarea" rows="5" v-model="config.base.tip" />
          </el-form-item>
          <el-form-item label="页面底部大叔照片">
            <el-checkbox v-model="config.base.footerXjAvatar">显示</el-checkbox>
          </el-form-item>
        </el-tab-pane>
        <el-tab-pane label="订阅" name="subscribe" class="">
          <el-card shadow="never" :body-style="{ padding: '20px' }" class="mb-3">
            <template #header> 年会员 </template>
            <div class="grid lg:grid-cols-3 gap-3">
              <el-form-item label="价格">
                <el-input v-model="config.subscribe.year.price" />
              </el-form-item>
              <el-form-item label="原价">
                <el-input v-model="config.subscribe.year.original" />
              </el-form-item>
              <el-form-item label="开启">
                <el-checkbox v-model="config.subscribe.year.state"> 开启 </el-checkbox>
              </el-form-item>
            </div>
          </el-card>

          <el-card shadow="never" :body-style="{ padding: '20px' }">
            <template #header> 永久帐号 </template>
            <div class="grid lg:grid-cols-3 gap-3">
              <el-form-item label="价格">
                <el-input v-model="config.subscribe.permanent.price" />
              </el-form-item>
              <el-form-item label="原价">
                <el-input v-model="config.subscribe.permanent.original" />
              </el-form-item>
              <el-form-item label="开启">
                <el-checkbox v-model="config.subscribe.permanent.state" label="1"> 开启 </el-checkbox>
              </el-form-item>
            </div>
          </el-card>
        </el-tab-pane>
      </el-tabs>

      <el-button type="primary" size="default" @click="update(config!)" class="mt-3">保存提交</el-button>
    </el-form>
  </main>
</template>

<style lang="scss" scoped>
:deep(.el-card__header) {
  @apply p-2 pl-5 bg-gray-50;
}
</style>
