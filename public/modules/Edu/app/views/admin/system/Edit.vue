<template>
  <div>
    <field :form.sync="form" @submit="submit" />
  </div>
</template>

<script>
import Field from './Field'
export default {
  components: { Field },
  data() {
    return {
      form: { lessons: [] }
    }
  },
  async created() {
    let response = await this.axios.get(`edu/admin/system/${this.$route.params.id}/edit`).then(r => r.data.data)
    this.$set(this, 'form', response)
  },
  methods: {
    async submit(data) {
      await this.axios.put(`edu/admin/system/${this.form.id}`, data)
      this.$message.success('修改成功')
      this.$router.push({ name: 'admin.system' })
    }
  }
}
</script>

<style>
</style>
