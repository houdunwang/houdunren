<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
const items = ref([
  { key: 'oss', label: 'oss', title: '阿里云' },
  { key: 'local', label: 'local', title: '本地服务器' },
])
</script>

<template>
  <el-form label-position="top">
    <el-form-item label="驱动">
      <el-radio-group v-model="config.upload.drive" size="small">
        <el-radio-button v-for="item in items" :key="item.key" :label="item.label">
          {{ item.title }}
        </el-radio-button>
      </el-radio-group>
    </el-form-item>
    <el-form-item label="图片大小">
      <el-input v-model="config.upload.image_size" placeholder="图片文件最大上传大小，单位字节" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
