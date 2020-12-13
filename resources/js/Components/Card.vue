<template>
  <div class="border shadow-md rounded-md">
    <div class="px-5 py-4 border-b border-gray-300" v-if="$slots.header">
      <slot name="header"></slot>
    </div>
    <div class="px-5 py-3">
      <slot></slot>
    </div>

    <div class="px-5 py-3 border-t border-gray-300" v-if="$slots.footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log(this.$slots);
  },
};
</script>
<style>
</style>
