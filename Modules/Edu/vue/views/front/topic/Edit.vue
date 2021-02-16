<template>
    <div class="container-xl mt-16">
        <x-form :id="$route.params.id" />
    </div>
</template>

<script>
import XForm from './Form'
export default {
    route: { path: `topic/:id/edit`, meta: { auth: true } },
    components: { XForm }
}
</script>

<style></style>
