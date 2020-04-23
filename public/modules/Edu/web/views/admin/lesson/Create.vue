<template>
  <field :action="`edu/admin/lesson?sid=${site.id}`" method="post" />
</template>

<script>
import Field from './Field'
import { mapState } from 'vuex'
export default {
  components: {
    Field
  },
  computed: {
    ...mapState('site', ['site'])
  }
}
</script>
