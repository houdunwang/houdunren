<template>
    <x-form :id="$route.params.id" />
</template>

<script>
import XForm from './Form'
export default {
    components: { XForm },
    route: { path: `lesson/:id/edit` }
}
</script>

<style></style>
