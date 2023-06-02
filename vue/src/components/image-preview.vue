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
    <!-- <el-dialog v-model="dialog" class="w-screen" :append-to-body="true" top="10px">
      <el-image :src="img" :lazy="true" />
    </el-dialog> -->
  </main>
</template>

<style lang="scss" scoped>
.dialog {
  @apply w-11/12 xl:w-1/12 2xl:w-2/12;
}
</style>
