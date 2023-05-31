<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="网站名称">
      <el-input rows="5" v-model="config.base.name" placeholder="顶部导航等使用的网站名称" />
    </el-form-item>
    <el-form-item label="站内通知">
      <el-input type="textarea" rows="3" v-model="config.base.notice" />
    </el-form-item>
    <el-form-item label="联系微信">
      <el-input v-model="config.base.weixin"></el-input>
    </el-form-item>
    <el-form-item label="联系邮箱">
      <el-input v-model="config.base.email"></el-input>
    </el-form-item>
    <el-form-item label="其他信息">
      <el-input v-model="config.base.other"></el-input>
    </el-form-item>
    <el-form-item label="icp">
      <el-input v-model="config.base.icp"></el-input>
    </el-form-item>
    <el-form-item label="广告语">
      <el-input v-model="config.base.ad"></el-input>
    </el-form-item>
    <el-form-item label="社区小贴">
      <el-input type="textarea" rows="5" v-model="config.base.tip" />
    </el-form-item>
    <el-form-item label="页面底部大叔照片">
      <el-checkbox v-model="config.base.footerXjAvatar">显示</el-checkbox>
    </el-form-item>
  </el-form>
</template>
