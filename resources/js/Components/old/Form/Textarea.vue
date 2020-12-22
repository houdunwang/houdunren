<template>
    <textarea
        @input="$emit('input', $event.target.value)"
        class="flex-grow py-2 px-3 shadow-sm rounded-md text-gray-900 focus:border-indigo-500 outline-none border border-gray-300 font-sans hover:shadow-md"
        :value="value"
    ></textarea>
</template>

<script>
export default {
    props: ["value"]
};
</script>

<style></style>
