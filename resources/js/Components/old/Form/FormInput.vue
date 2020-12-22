<template>
    <div class="flex flex-col mb-5">
        <hd-label class="mb-3" :value="title" />
        <hd-input :value="value" @input="$emit('input', $event)" />
        <hd-error :name="name" />
    </div>
</template>

<script>
export default {
    props: ["title", "value", "name"]
};
</script>

<style></style>
