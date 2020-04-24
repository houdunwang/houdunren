<template>
  <field v-if="form.id" :action="`edu/admin/system/${form.id}`" method="put" :form="form" />
</template>

<script>
import Field from './Field'
export default {
  components: { Field },
  inject: ['sid'],
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let response = await this.axios.get(`edu/admin/system/${this.$route.params.id}?sid=${this.sid}`).then(r => r.data)
    this.$set(this, 'form', response)
  }
}
</script>

<style>
</style>
