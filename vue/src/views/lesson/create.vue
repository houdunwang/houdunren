<script setup lang="ts">
import draggable from 'vuedraggable'
const { add } = useLesson()
const { findAll: getAllSystem, collection: systems } = useSystem()
const lessonType = ref('system')
const changeType = () => {
  getAllSystem(1, { type: lessonType.value })
}
await getAllSystem(1, { type: lessonType.value })
const form = reactive({
  title: '',
  description: '',
  preview: '',
  video: '',
  price: 0,
  download_address: '',
  system_id: undefined,
  videos: [{ title: '', path: '' }],
})
</script>

<template>
  <main>
    <HdCard>
      <template #header> 创建课程</template>
      <template #default>
        <el-form label-width="80px" :inline="false" label-position="top" size="large" class="p-5">
          <el-form-item label="课程标题" prop="title">
            <el-input v-model="form.title" placeholder="请输入课程标题"></el-input>
            <HdError name="title" />
          </el-form-item>
          <el-form-item label="所属类别">
            <el-radio-group v-model="lessonType" @change="changeType">
              <el-radio label="system"> 系统课程 </el-radio>
              <el-radio label="project"> 实战项目 </el-radio>
            </el-radio-group>
          </el-form-item>
          <el-form-item label="所属系统课程" prop="title">
            <el-select v-model="form.system_id" placeholder="所属系统课程" clearable filterable>
              <el-option v-for="item in systems!" :key="item.id" :label="item.title" :value="item.id!"> </el-option>
            </el-select>
          </el-form-item>
          <el-form-item label="预览图片">
            <HdUploadSingleImage v-model="form.preview" />
            <HdError name="preview" />
          </el-form-item>
          <el-form-item label="课程简介">
            <el-input type="textarea" v-model="form.description" placeholder="请输入课程的文字介绍"></el-input>
            <HdError name="description" />
          </el-form-item>
        </el-form>
      </template>
    </HdCard>
    <HdCard class="mt-5">
      <template #header> 视频列表 </template>
      <template #default>
        <draggable v-model="form.videos" group="people" @end="false" item-key="id" class="grid grid-cols-4 p-5 gap-5">
          <template #item="{ element: video }">
            <div class="p-5 border shadow-sm rounded-md bg-white">
              <el-form label-width="80px" :inline="false" size="default">
                <el-form-item label="视频标题">
                  <el-input v-model="video.title"></el-input>
                </el-form-item>
                <el-form-item label="视频地址">
                  <el-input v-model="video.path"></el-input>
                </el-form-item>
              </el-form>
            </div>
          </template>
        </draggable>
      </template>
      <template #footer>
        <div class="p-5">
          <el-button type="primary" @click="add(form)">保存提交</el-button>
          <el-button type="success" @click="form.videos.push({ title: '', path: '' })">添加视频</el-button>
        </div>
      </template>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
