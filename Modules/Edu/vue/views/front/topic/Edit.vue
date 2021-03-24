<template>
    <x-form :id="$route.params.id" />
</template>

<script>
import XForm from './Form'
export default {
    route: { path: `topic/:id/edit`, meta: { auth: true } },
    components: { XForm }
}
</script>

<style></style>
