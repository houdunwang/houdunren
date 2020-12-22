<template>
    <button
        class="border px-3 py-2 flex items-center justify-center rounded-md font-sans shadow-sm font-bold"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {};
</script>

<style>
.primary {
    @apply bg-indigo-600 text-white;
}
.success {
    @apply bg-green-600 text-white;
}
.warning {
    @apply bg-red-600 text-white;
}
</style>
