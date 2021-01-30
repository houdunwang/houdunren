<template>
    <div>
        <XForm :id="$route.params.id" />
    </div>
</template>

<script>
import XForm from './Form'
export default {
    route: { path: 'site/:id/edit' },
    components: { XForm }
}
</script>

<style></style>
