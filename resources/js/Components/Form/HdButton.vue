<template>
    <button class="btn">
        <slot></slot>
    </button>
</template>

<script>
export default {};
</script>

<style>
.btn {
    @apply border px-3 py-2 text-sm font-bold flex items-center justify-center rounded-md font-sans text-gray-100;
}
.primary {
    @apply bg-indigo-600;
}
.success {
    @apply bg-green-500;
}
.gray {
    @apply bg-gray-500;
}
</style>
