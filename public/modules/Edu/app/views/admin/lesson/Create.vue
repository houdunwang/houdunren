<template>
  <field @submit="submit" :field="field" />
</template>

<script>
import Field from './Field'
export default {
  data() {
    return {
      field: {
        tags: [],
        videos: []
      }
    }
  },
  components: {
    Field
  },
  methods: {
    async submit(lesson) {
      let response = await this.axios.post(`edu/admin/lesson`, this.field).then(r => r.data)
      this.$router.push({ name: 'admin.lesson' })
    }
  }
}
</script>

<style></style>
