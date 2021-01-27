<template>
    <div v-show="false">{{ $page.props.flash.message }} {{ $page.props.flash.error }}</div>
</template>

<script>
export default {
    updated() {
        const flash = this.$page.props.flash
        const type = flash.success ? 'success' : 'error'
        const message = this.$page.props.flash[type]

        if (message) {
            this.$message({ message: message, type: type })
        }
        if (this.$page.props.flash.message) {
            this.$confirm(this.$page.props.flash.message, '温馨提示', {
                type: 'warning',
                center: true,
                showCancelButton: false
            })
        }
    }
}
</script>

<style></style>
