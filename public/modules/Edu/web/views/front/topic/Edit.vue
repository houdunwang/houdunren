<template>
  <field
    title="更新贴子"
    :action="`edu/front/topic/${form.id}`"
    :form="form"
    method="put"
    v-if="form.id"
  />
</template>

<script>
import Field from './FIeld'
export default {
  components: { Field },
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let topic = await this.axios.get(`edu/front/topic/${this.$route.params.id}`).then(r => r.data)
    console.log(topic)

    topic.tags = topic.tags.map(m => m.id)
    console.log(topic)

    this.$set(this, 'form', topic)
  }
}
</script>

<style>
</style>
