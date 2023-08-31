<script setup lang="ts">
const {
  config: { lesson },
} = useConfigStore()
const tab = ref('base')
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="用户配置" name="base">
        <el-form label-width="100px" label-position="top" :inline="false" class="border p-5 rounded-md">
          <div class="ms-center">
            <el-form-item label="">
              <template #label>
                课程显示方式
                <RouterLink :to="{ name: 'lesson' }" target="_blank" class="text-orange-500">查看效果</RouterLink>
              </template>
              <el-radio-group v-model="lesson.lessonShowType" size="default">
                <el-radio-button label="image" border class="mx-0!">图片</el-radio-button>
                <el-radio-button label="color" border>随机颜色</el-radio-button>
              </el-radio-group>
            </el-form-item>
          </div>
        </el-form>
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
