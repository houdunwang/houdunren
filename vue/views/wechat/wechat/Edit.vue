<template>
    <x-form :id="$route.query.id" />
</template>

<script>
import XForm from './Form'
export default {
    components: { XForm }
}
</script>

<style></style>
