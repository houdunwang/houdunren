<script setup lang="ts">
const route = useRoute()
const { update, findOne, model: form } = useMorning()
await findOne(route.params.id)
</script>

<template>
  <HdCard>
    <template #header> 添加活动 </template>
    <section class="p-5">
      <el-form label-width="80px" :inline="false" size="large" label-position="top">
        <el-form-item label="活动礼品图片">
          <HdUploadSingleImage v-model="form.image" />
          <HdError name="image" />
        </el-form-item>
        <el-form-item label="活动礼品链接">
          <el-input v-model="form.url"></el-input>
          <HdError name="url" />
        </el-form-item>
        <el-form-item label="开箱视频">
          <el-input v-model="form.video"></el-input>
          <HdError name="video" />
        </el-form-item>
        <el-form-item label="活动结束">
          <el-radio-group v-model="form.state">
            <el-radio :label="true"> 已经结束 </el-radio>
            <el-radio :label="false"> 正在进行 </el-radio>
          </el-radio-group>
        </el-form-item>
        <el-form-item label="活动礼品图片">
          <el-date-picker
            v-model="form.end_time"
            type="datetime"
            placeholder="请选择活动结束时间"
            size="large"
            value-format="YYYY-MM-DD H:mm:ss" />
          <HdError name="end_time" />
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="update(form)">保存提交</el-button>
        </el-form-item>
      </el-form>
    </section>
  </HdCard>
</template>

<style lang="scss"></style>
