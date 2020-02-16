<template>
  <div>

  </div>
</template>

<script>
  export default {
    name: "Field",
    data() {
      return {
        field: {
          name: '',
          modules: [],
        }
      }
    },
    async created() {
      let response = await this.axios('/system/module');
      this.modules = response.data;
    },
  }
</script>

<style scoped>

</style>
