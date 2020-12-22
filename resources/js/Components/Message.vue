<template>
    <div>
        <div v-show="this.$page.flash.message || this.$page.flash.error"></div>
    </div>
</template>

<script>
export default {
    updated() {
        const flash = this.$page.flash
        const type = flash.success ? 'success' : 'error'
        const message = this.$page.flash[type]

        if (message) {
            this.$message({ message: message, type: type })
        }
    }
}
</script>

<style></style>
