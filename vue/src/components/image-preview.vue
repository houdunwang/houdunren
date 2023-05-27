<script setup lang="ts">
const img = ref<string>()
const dialog = ref(false)
const main = ref<HTMLMapElement>()
onMounted(() => {
  main.value!.querySelectorAll('img').forEach((item) => {
    item.addEventListener('click', () => {
      img.value = item.src
      dialog.value = true
    })
  })
})
</script>

<template>
  <main ref="main">
    <slot />
    <el-dialog v-model="dialog" class="dialog" :append-to-body="true">
      <div class="flex justify-center">
        <el-image :src="img" :lazy="true" class="w-full" />
      </div>
    </el-dialog>
  </main>
</template>

<style lang="scss" scoped>
:deep(.dialog) {
  @apply w-11/12 xl:w-2/3 2xl:w-1/2;
}
</style>
