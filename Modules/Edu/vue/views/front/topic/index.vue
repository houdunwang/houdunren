<template>
    <div></div>
</template>

<script>
export default {
    data() {
        return {
            topics: []
        }
    },
    create() {
        this.axios.get(``)
    },
    meta: { auth: false }
}
</script>

<style></style>
