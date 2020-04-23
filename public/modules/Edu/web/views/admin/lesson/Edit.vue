<template>
  <field :action="`edu/admin/lesson/${form.id}?sid=${site.id}`" method="put" :form="form" />
</template>

<script>
import Field from './Field'
import { mapState } from 'vuex'
export default {
  components: { Field },
  data() {
    return {
      form: {}
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  async created() {
    let response = await this.axios.get(`edu/admin/lesson/${this.$route.params.id}?sid=${this.site.id}`)
    response.data.tags = response.data.tags.map(t => t.id)
    this.$set(this, 'form', response.data)
  }
}
</script>

<style></style>
