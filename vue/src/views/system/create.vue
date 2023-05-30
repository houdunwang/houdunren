<script setup lang="ts">
import Card from '@/components/hd/card.vue'
import router from '@/plugins/router'
const { add, model } = useSystem()
const onSubmit = async () => {
  await add()
  router.push({ name: 'admin.system', query: { type: model.value.type } })
}
</script>

<template>
  <Card>
    <template #header> 增加系统课程</template>
    <template #default>
      <el-form label-width="80px" :inline="false" label-position="top" size="large" class="p-5">
        <el-form-item label="课程标题" prop="title">
          <el-input v-model="model.title" placeholder="请输入课程标题"></el-input>
          <HdError name="title" />
        </el-form-item>
        <el-form-item label="课程类型" prop="type">
          <el-radio-group v-model="model.type">
            <el-radio label="system"> 系统课程 </el-radio>
            <el-radio label="project"> 实战项目 </el-radio>
          </el-radio-group>
        </el-form-item>
        <el-form-item label="预览图片" required>
          <div>
            <HdUploadSingleImage v-model="model.preview" />
            <HdError name="preview" />
          </div>
        </el-form-item>
        <el-form-item label="课程简介" required>
          <el-input type="textarea" v-model="model.description" placeholder="请输入课程的文字介绍"></el-input>
          <HdError name="description" />
        </el-form-item>
        <el-form-item label="网盘地址" prop="download_address">
          <el-input v-model="model.download_address" placeholder="高清视频网盘下载地址"></el-input>
          <HdError name="download_address" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit">保存提交</el-button>
        </el-form-item>
      </el-form>
    </template>
  </Card>
</template>
