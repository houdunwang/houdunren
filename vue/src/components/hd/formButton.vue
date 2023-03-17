<script setup lang="ts"></script>

<template>
  <button class="hd-button">
    <slot></slot>
  </button>
</template>

<style lang="scss" scoped>
.hd-button {
  @apply py-2 px-4 rounded-md;
  &.primary {
    @apply bg-violet-700 text-white hover:bg-violet-500 duration-300;
  }
  &.danger {
    @apply bg-fuchsia-700 text-white hover:bg-fuchsia-500;
  }
  &.success {
    @apply bg-green-700 text-white hover:bg-green-500;
  }
  &[disabled] {
    @apply bg-gray-400 hover:bg-gray-400 cursor-not-allowed;
  }
}
</style>
