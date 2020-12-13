<template>
  <form @submit.prevent="handleSubmit">
    <div class="bg-white rounded-md p-6">
      <hd-card class="bg-white">
        <template v-slot:header> 站点资料 </template>
        <template v-slot:default>
          <div class="flex flex-col mb-5">
            <hd-label class="mb-3">站点名称</hd-label>
            <hd-input v-model="form.title" id="title" />
            <hd-error name="title" />
          </div>

          <div class="flex flex-col mb-5">
            <hd-label class="mb-3">访问域名</hd-label>
            <hd-input v-model="form.domain" id="domain" />
            <hd-error name="domain" />
          </div>
        </template>
      </hd-card>

      <hd-card class="bg-white mt-5">
        <template v-slot:header> 默认模块 </template>
        <template v-slot:default> </template>
      </hd-card>

      <hd-button class="mt-5">保存提交</hd-button>
    </div>
  </form>
</template>

<script>
const form = { title: "", domain: "" };
export default {
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
