<template>
  <field @submit="submit" :field.sync="field" />
</template>

<script>
import Field from './Field'
export default {
  components: { Field },
  data() {
    return {
      field: {}
    }
  },
  async created() {
    let response = await this.axios.get(`edu/admin/lesson/${this.$route.params.id}/edit`).then(r => r.data.data)
    response.tags = response.tags.map(t => t.id)
    this.$set(this, 'field', response)
  },
  methods: {
    async submit(lesson) {
      await this.axios.put(`edu/admin/lesson/${this.field.id}`, this.field)
      this.$router.push({ name: 'admin.lesson' })
    }
  }
}
</script>

<style></style>
