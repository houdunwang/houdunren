<template>
  <field :action="`/site/site/${form.id}`" :form="form" method="put" v-if="form" />
</template>

<script>
import Field from './layouts/Field'
export default {
  components: {
    Field
  },
  data() {
    return {
      form: null
    }
  },
  async created() {
    let response = await this.axios.get(`/site/site/${this.$route.params.sid}`)
    this.$set(this, 'form', response.data)
  }
}
</script>

<style></style>
