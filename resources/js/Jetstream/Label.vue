<template>
    <label class="block font-medium  text-gray-700">
        <span v-if="value" class="text-sm">{{ value }}</span>
        <span v-else class="text-sm"><slot></slot></span>
    </label>
</template>

<script>
export default {
    props: ["value"]
};
</script>
