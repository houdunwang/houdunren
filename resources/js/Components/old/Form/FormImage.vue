<template>
    <div class="flex flex-col">
        <hd-label class="mb-3" :value="title" />
        <hd-image :value="value" @input="$emit('input', $event)" />
        <hd-error :name="name" />
    </div>
</template>

<script>
export default {
    props: {
        action: { type: String, default: "" },
        title: { type: String },
        name: { type: String },
        value: { type: String }
    },
    data() {
        return {};
    }
};
</script>

<style></style>
