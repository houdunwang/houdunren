<script setup lang="ts">
import { ref } from 'vue'
const file = ref('')
</script>

<template>
  <HdUploadSingleImage v-model="file" />
</template>
