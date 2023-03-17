<script lang="ts" setup>
import { Plus } from '@element-plus/icons-vue'
const { uploadImage } = useUpload()

const props = defineProps<{
  modelValue: string
}>()
const imageUrl = ref(props.modelValue)

const emit = defineEmits<{
  (e: 'update:modelValue', url: string): void
}>()

const request = async (options: any) => {
  const form = new FormData()
  form.append('file', options.file)

  const { data } = await uploadImage(form)
  imageUrl.value = data.url
  emit('update:modelValue', imageUrl.value!)
}
</script>

<template>
  <div class="">
    <el-upload action="" class="avatar-uploader" :http-request="request" :show-file-list="false">
      <img v-if="imageUrl" :src="imageUrl" class="avatar" />
      <el-icon v-else class="avatar-uploader-icon">
        <Plus />
      </el-icon>
    </el-upload>

    <HdError name="file" />
  </div>
</template>

<style scoped>
.avatar-uploader .avatar {
  height: 178px;
  display: block;
  @apply bg-gray-200;
}
</style>

<style>
.avatar-uploader .el-upload {
  @apply border;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: var(--el-transition-duration-fast);
}

.avatar-uploader .el-upload:hover {
  border-color: var(--el-color-primary);
}

.el-icon.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  min-width: 80px;
  height: 50px;
  text-align: center;
}
</style>
