<script setup lang="ts"></script>

<template>
  <div class="border-gray-200 rounded-xl bg-white">
    <h1 class="p-5 py-3 opacity-90 font-normal border-b border-b-gray-200" v-if="$slots.header">
      <slot name="header" />
    </h1>
    <div class="p-5">
      <slot />
    </div>
    <div class="px-5 py-3 bg-gray-50 border-t border-t-gray-100 gap-2" v-if="$slots.footer">
      <slot name="footer" />
    </div>
  </div>
</template>
