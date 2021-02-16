<template>
    <div class="container-xl">
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
