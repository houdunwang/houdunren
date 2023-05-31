<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="课程列表页显示方式">
      <el-radio-group v-model="config.content.lesson_show_type" size="default">
        <el-radio-button label="image">图片</el-radio-button>
        <el-radio-button label="color">随机颜色</el-radio-button>
      </el-radio-group>
    </el-form-item>
  </el-form>
</template>
