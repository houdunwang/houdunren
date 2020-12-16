<template>
  <div class="text-xs font-bold text-red-700 mt-2" v-if="$page.errors[name]">
    <i class="fa fa-info-circle" aria-hidden="true"></i>
    {{ $page.errors[name] }}
  </div>
</template>

<script>
export default {
  props: ["name"],
  updated() {
    document.querySelector(`#${this.name}`).addEventListener("focus", () => {
      this.$page.errors[this.name] = "";
    });
  },
};
</script>

<style>
</style>
