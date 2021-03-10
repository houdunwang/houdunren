<template>
    <image-upload v-model="form[field.name]" />
</template>

<script>
export default {
    props: ['field', 'form']
}
</script>

<style></style>
