<template>
  <master>
    <field action="system/package" />
  </master>
  <!-- <field @submit="submit" :form="form" :moduleIds.sync="moduleIds" /> -->
</template>

<script>
import Field from './layouts/Field'
import Master from './layouts/Master'
export default {
  components: { Field, Master },
  data() {
    return {
      form: { name: '' },
      moduleIds: []
    }
  },
  methods: {
    async submit(form) {
      await this.axios.post(`system/package`, form)
      this.$success({ title: '温馨提示', content: '添加成功', maskClosable: true })
      this.form.name = ''
      this.moduleIds = []
      this.$emit('load')
    }
  }
}
</script>

<style scoped></style>
