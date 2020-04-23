<template>
  <div>
    <field :action="`edu/admin/system`" method="post" />
  </div>
</template>

<script>
import Field from './Field'
export default {
  components: { Field },
  data() {
    return {
      //   form: { lessons: [] }
    }
  },
  methods: {
    // async submit(data) {
    //   await this.axios.post(`edu/admin/system`, data)
    //   this.$message.success('添加成功')
    //   this.$router.push({ name: 'admin.system' })
    // }
  }
}
</script>

<style>
</style>
