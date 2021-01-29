<template>
    <div>
        <XForm />
    </div>
</template>

<script>
import XForm from './Form'
export default {
    route: { path: 'site/:id/edit' },
    components: { XForm },
    created() {
        console.log(1)
    },
    data() {
        return {}
    }
}
</script>

<style></style>
