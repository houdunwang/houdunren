<script setup lang="ts">
const { store, model, find, update } = useSoft()
const route = useRoute()
if (route.params.id) {
  await find(+route.params.id)
}
</script>

<template>
  <el-card shadow="never" :body-style="{ padding: '20px' }">
    <template #header>{{ $route.params.id ? '更新' : '添加' }}软件 </template>
    <el-form label-width="80px" :inline="false" size="default">
      <el-form-item label="标题">
        <el-input v-model="model.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="软件标识">
        <el-input v-model="model.name"></el-input>
        <HdError name="name" />
      </el-form-item>
      <el-form-item label="版本号">
        <el-input v-model="model.version"></el-input>
        <HdError name="version" />
      </el-form-item>
      <el-form-item label="开发教程">
        <el-input v-model="model.lesson"></el-input>
        <HdError name="version" />
      </el-form-item>
      <el-form-item label="免费">
        <el-checkbox v-model="model.free" :label="true">是</el-checkbox>
        <HdError name="free" />
      </el-form-item>
      <el-form-item label="简短介绍">
        <el-input v-model="model.description" type="textarea"></el-input>
        <HdError name="description" />
      </el-form-item>
      <el-form-item label="下载地址">
        <el-input v-model="model.download"></el-input>
        <HdError name="download" />
      </el-form-item>
      <el-form-item label="预览图">
        <div class="flex flex-col">
          <HdUploadSingleImage v-model="model.preview" />
          <HdError name="preview" />
        </div>
      </el-form-item>
      <el-form-item label="详细说明">
        <div class="w-full">
          <HdMarkdownEditor v-model="model.content" :height="400" />
        </div>
        <HdError name="content" />
      </el-form-item>
      <el-form-item label="github">
        <el-input v-model="model.github"></el-input>
      </el-form-item>
      <el-form-item label="gitee">
        <el-input v-model="model.gitee"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="$route.params.id ? update() : store()">保存提交</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>
