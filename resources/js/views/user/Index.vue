<template>
  <div>
    <router-view></router-view>
    <error />
  </div>
</template>

<script>
import Error from '@/components/Error'
export default {
  components: { Error }
}
</script>

<style></style>
