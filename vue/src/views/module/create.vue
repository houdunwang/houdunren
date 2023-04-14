<script setup lang="ts">
const { update, model, store } = useModule()
const route = useRoute()
</script>

<template>
  <main class="">
    <div class="p-3 bg-white border rounded-md mb-2 text-gray-500 text-sm leading-loose">
      模块会创建在 Modules目录中，Config/config.php 用于定义模块配置。
      <br />
      详细使用请访问
      <a href="https://doc.houdunren.com" target="_blank" class="text-teal-600 font-bold">后盾人文档库</a>
    </div>

    <el-card shadow="never" :body-style="{ padding: '20px' }" v-if="model">
      <template #header>模块设计 </template>
      <el-form :model="model" ref="form" label-width="80px" :inline="false">
        <el-form-item label="名称">
          <el-input v-model="model.name" placeholder="只能输入英文字母"></el-input>
        </el-form-item>
        <el-form-item label="域名">
          <el-input v-model="model.domain" placeholder="模块访问域名，不要添加 http 或 https"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="store">创建模块</el-button>
        </el-form-item>
      </el-form>
    </el-card>
  </main>
</template>
