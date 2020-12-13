<template>
  <div class="flex flex-col mb-5">
    <hd-label class="mb-3">{{ title }}</hd-label>
    <hd-input :value="value" :id="name" @input="$emit('input', $event)" />
    <hd-error :name="name" />
  </div>
</template>

<script>
export default {
  props: ["title", "name", "value"],
};
</script>

<style>
</style>
