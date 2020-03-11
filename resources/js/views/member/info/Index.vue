<template>
  <div>
    <bases :form.sync="form" @submit="onSubmit" v-if="$route.params.type === 'base'" />
    <email :form.sync="form" @submit="onSubmit" v-if="$route.params.type === 'email'" />
    <password :form.sync="form" @submit="onSubmit" v-if="$route.params.type === 'password'" />
    <phone :form.sync="form" @submit="onSubmit" v-if="$route.params.type === 'phone'" />
    <icon :form.sync="form" @submit="onSubmit" v-if="$route.params.type === 'icon'" />
  </div>
</template>

<script>
import Base from './components/Base'
import Email from './components/Email'
import Password from './components/Password'
import Phone from './components/Phone'
import Icon from './components/Icon'
import { mapState } from 'vuex'
import _ from 'lodash'
export default {
  components: { Bases: Base, Email, Password, Phone, Icon },
  data() {
    return {}
  },
  computed: {
    ...mapState('user', { form: 'data' })
  },
  async created() {},
  methods: {
    async onSubmit(fields) {
      await this.axios.put(`member/user`, _.pick(this.form, fields))
      this.$store.dispatch('user/get')
      this.$message.success('修改成功')
    }
  }
}
</script>

<style></style>
