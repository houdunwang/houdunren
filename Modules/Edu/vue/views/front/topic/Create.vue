<template>
    <x-form />
</template>

<script>
import XForm from './Form'
export default {
    route: { meta: { auth: true } },
    components: { XForm }
}
</script>

<style></style>
