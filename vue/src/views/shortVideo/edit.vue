<script setup lang="ts">
const { find, model: form, update } = useShortVideo()
const route = useRoute()
await find(+route.params.id)
</script>

<template>
  <main v-if="form">
    <HdCard>
      <template #header> 添加视频</template>
      <template #default>
        <el-form label-width="80px" :inline="false" label-position="top" size="large" class="p-5">
          <el-form-item label="课程标题" prop="title">
            <el-input v-model="form.title" placeholder="请输入课程标题"></el-input>
            <HdError name="title" />
          </el-form-item>
          <el-form-item label="预览图片">
            <HdUploadSingleImage v-model="form.preview" />
            <HdError name="preview" />
          </el-form-item>
          <el-form-item label="视频地址">
            <el-input v-model="form.path" placeholder="请输入视频地址"></el-input>
            <HdError name="description" />
          </el-form-item>
        </el-form>
      </template>
      <template #footer>
        <div class="p-5">
          <el-button type="primary" @click="update(form)">保存提交</el-button>
        </div>
      </template>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
