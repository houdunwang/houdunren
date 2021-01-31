<template>
    <x-form :id="$route.params.id" />
</template>

<script>
import XForm from './Form.vue'
export default {
    route: { path: `group/:id/edit` },
    components: { XForm }
}
</script>

<style></style>
