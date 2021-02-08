<template>
    <div class="container-xl mt-16">
        <x-form />
    </div>
</template>

<script>
import XForm from './Form'
export default {
    route: { meta: { auth: true } },
    components: { XForm }
}
</script>

<style></style>
