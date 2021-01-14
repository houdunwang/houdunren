<template>
    <div v-show="false">
        <!-- <div v-show="$page.props.flash.message || $page.props.flash.error"></div>
        <div v-show="$page.props.flash.message" class="border px-4 py-2 rounded-md shadow-sm bg-green-100 text-green-700 border-green-500">
            <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $page.props.flash.message }}
        </div> -->
        {{ $page.props.flash.message }} {{ $page.props.flash.error }}
    </div>
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
