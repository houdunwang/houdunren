<template>
  <form @submit.prevent="handleSubmit">
    <div class="p-6 bg-white rounded-md">
      <card class="bg-white">
        <template v-slot:header> 站点资料 </template>
        <template v-slot:default>
          <form-input title="站点名称" name="title" v-model="form.title" />
          <form-input title="站点域名" name="domain" v-model="form.domain" />
        </template>
      </card>

      <card class="mt-5 bg-white">
        <template v-slot:header> 默认模块 </template>
        <template v-slot:default> </template>
      </card>

      <hd-button class="mt-5">保存提交</hd-button>
    </div>
  </form>
</template>

<script>
const form = { title: "", domain: "" };
export default {
  props: ["modules"],
  data() {
    return {
      form,
    };
  },
  methods: {
    handleSubmit() {
      this.$inertia.post(route("site.site.store"), this.form);
    },
  },
};
</script>

<style>
</style>
