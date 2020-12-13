<template>
  <textarea
    @input="$emit('input', $event.target.value)"
    class="border py-2 px-3 shadow-md rounded-md text-gray-900 focus:border-indigo-500 outline-none border-2 border-gray-600 font-sans"
  ></textarea>
</template>

<script>
export default {};
</script>

<style>
</style>
