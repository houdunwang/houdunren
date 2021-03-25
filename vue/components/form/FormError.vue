<template>
    <div class="text-xs font-bold text-red-700 mt-2" v-if="errors(name)">
        <!-- <div v-if="errors(name)"> -->
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        {{ errors(name) }}
        <!-- </div>
        <div v-else>&nbsp;</div> -->
    </div>
</template>

<script>
export default {
    props: ['name']
}
</script>

<style></style>
