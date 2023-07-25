<script setup lang="ts">
import router from '@/plugins/router'

const { getSystemInfo, update, model: form } = useSystem()
const route = useRoute()
await getSystemInfo(+route.params.id)

const onSubmit = async () => {
  await update()
  router.push({ name: 'admin.system' })
}
</script>

<template>
  <HdCard>
    <template #header> 编辑系统课程</template>
    <template #default>
      <el-form label-width="80px" :inline="false" label-position="top" size="large" class="p-5">
        <el-form-item label="课程标题" prop="title">
          <el-input v-model="form.title" placeholder="请输入课程标题"></el-input>
          <HdError name="title" />
        </el-form-item>
        <el-form-item label="课程类型" prop="type">
          <el-radio-group v-model="form.type">
            <el-radio label="system"> 系统课程 </el-radio>
            <el-radio label="project"> 实战项目 </el-radio>
          </el-radio-group>

          <el-input v-model="form.title" placeholder="请输入课程标题"></el-input>
          <HdError name="title" />
        </el-form-item>
        <el-form-item label="预览图片">
          <HdUploadSingleImage v-model="form.preview" />
          <HdError name="preview" />
        </el-form-item>
        <el-form-item label="课程简介">
          <el-input type="textarea" v-model="form.description" placeholder="请输入课程的文字介绍"></el-input>
          <HdError name="description" />
        </el-form-item>
        <el-form-item label="网盘地址" prop="form.download_address">
          <el-input v-model="form.download_address" placeholder="高清视频网盘下载地址"></el-input>
          <HdError name="download_address" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </el-form-item>
      </el-form>
    </template>
  </HdCard>
</template>

<style lang="scss"></style>
