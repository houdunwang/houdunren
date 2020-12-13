<template>
  <div>
    <div
      class="border shadow-md py-3 px-4 rounded-md text-gray-900"
      v-if="$page.flash.message"
    >
      {{ $page.flash.message }}
    </div>
    <div
      class="border shadow-md py-3 px-4 rounded-md border-red-700 text-red-700"
      v-if="$page.flash.error"
    >
      {{ $page.flash.error }}
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
