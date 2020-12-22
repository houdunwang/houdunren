<template>
    <table class="hd-table">
        <thead>
            <tr>
                <slot name="header"> </slot>
            </tr>
        </thead>
        <tbody class="border">
            <tr v-for="field in data" :key="field.id">
                <slot :field="field"></slot>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ["data"],
};
</script>

<style>
.hd-table {
    @apply w-full bg-white text-base;
}
.hd-table tr td,
.hd-table tr th {
    @apply border py-3 px-3 text-left;
}
</style>
