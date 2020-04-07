<template>
  <div>
    <field @submit="submit" :form.sync="form" :moduleIds.sync="moduleIds" v-if="form.name" />
  </div>
</template>

<script>
import Field from './layouts/Field'

export default {
  props: {
    id: {
      type: Number,
      default: 0
    }
  },
  components: { Field },
  data() {
    return {
      form: { name: '' },
      moduleIds: []
    }
  },
  async created() {
    let response = await this.axios.get(`system/package/${this.id}`)
    this.$set(
      this,
      'moduleIds',
      response.data.data.modules.map(m => m.model.id)
    )
    this.$set(this, 'form', response.data.data)
  },
  methods: {
    async submit(form) {
      await this.axios.put(`system/package/${this.id}`, form)
      this.$emit('update:id', 0)
      this.$emit('load')
    }
  }
}
</script>

<style scoped></style>
