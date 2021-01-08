<template>
    <div class="text-xs font-bold text-red-700 mt-2" v-if="message">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        {{ message }}
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style></style>
