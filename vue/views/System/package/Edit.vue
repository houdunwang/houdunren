<template>
    <x-form :id="$route.params.id" />
</template>

<script>
import XForm from './Form'
export default {
    route: { path: `package/edit/:id` },
    components: { XForm }
}
</script>

<style></style>
