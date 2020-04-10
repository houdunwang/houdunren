<template>
  <field :action="`system/group/${$route.params.id}`" method="put" :form="form" v-if="form.id" />
</template>

<script>
import Field from './layouts/Field'

export default {
  components: { Field },
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let group = await this.axios.get(`system/group/${this.$route.params.id}`).then(r => r.data)
    group.package_id = group.packages.map(p => p.id)
    this.$set(this, 'form', group)
  }
}
</script>

<style scoped></style>
