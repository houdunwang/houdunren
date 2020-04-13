<template>
  <master>
    <field v-if="form.id" :action="`system/package/${form.id}`" :form="form" method="put" />
  </master>
</template>

<script>
import Field from './layouts/Field'
import Master from './layouts/Master'
export default {
  components: { Field, Master },
  data() {
    return {
      form: {},
      moduleIds: []
    }
  },
  async created() {
    let response = await this.axios.get(`system/package/${this.$route.params.id}`)
    response.data.modules = response.data.modules.map(m => m.model.id)
    this.$set(this, 'form', response.data)
  }
}
</script>

<style scoped></style>
