<template>
  <input
    type="text"
    @input="$emit('input', $event.target.value)"
    class="flex-grow py-2 px-3 shadow-sm rounded-md text-gray-900 focus:border-indigo-500 outline-none border-2 border-gray-300 font-sans hover:shadow-md"
  />
</template>

<script>
export default {};
</script>

<style>
</style>
