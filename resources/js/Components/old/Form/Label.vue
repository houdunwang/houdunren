<template>
    <label class="text-gray-900">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot></slot></span>
    </label>
</template>

<script>
export default {
    props: ["value"]
};
</script>

<style></style>
