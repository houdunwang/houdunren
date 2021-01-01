<template>
    <div>
        <div v-show="$page.flash.message || $page.flash.error"></div>
        <div v-show="$page.flash.message" class="border px-4 py-2 rounded-md shadow-sm bg-green-100 text-green-700 border-green-500">
            <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $page.flash.message }}
        </div>
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
